<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Selected_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Permission;

class SelecteduserController extends Controller
{
    // Show the list of roles
    public function rolelist()
{
    abort_if(Gate::denies('role read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    $roles = Selected_role::all();

    return view('admin.roles', compact('roles'));
}

    // Show the form to insert a new role
    public function insertpage()
    {
        abort_if(Gate::denies('role write'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all();
        return view('admin.create_roles', compact('permissions')); // Adjust view path as needed
    }

    // Handle the insertion of a new role
    public function insert(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|boolean',
        'amount' => 'required|numeric|min:0',
        'permissions' => 'nullable|array', // Validate permissions as an array
        'permissions.*' => 'exists:permissions,id', // Ensure each permission exists in the permissions table
    ]);

    // Create the role
    $selectedRole = Selected_role::create([
        'name' => $request->input('name'),
        'status' => $request->input('status'),
        'amount' => $request->input('amount'),
    ]);

    // Attach permissions to the role
    if ($request->has('permissions')) {
        $selectedRole->permissions()->attach($request->input('permissions'));
    }

    return redirect()->route('admin.roles')->with('success', 'Role added successfully.');
}


    // Show the form to edit an existing role
    public function edit_role_page($id)
{
    abort_if(Gate::denies('role write'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    // Fetch the role and its permissions
    $role = Selected_role::findOrFail($id);
    $permissions = Permission::all();
    $rolePermissions = $role->permissions->pluck('id')->toArray(); // Get the role's current permissions

    return view('admin.update_roles', compact('role', 'permissions', 'rolePermissions')); // Adjust view path as needed
}

// Handle the update of an existing role
public function update_role_page(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|boolean',
        'amount' => 'required|numeric|min:0',
        'permissions' => 'nullable|array', // Validate permissions as an array
        'permissions.*' => 'exists:permissions,id', // Ensure each permission exists in the permissions table
    ]);

    $role = Selected_role::findOrFail($id);

    // Update the role
    $role->update([
        'name' => $request->input('name'),
        'status' => $request->input('status'),
        'amount' => $request->input('amount'),
    ]);

    // Sync the permissions (update pivot table)
    if ($request->has('permissions')) {
        $role->permissions()->sync($request->input('permissions'));
    } else {
        // If no permissions are selected, detach all permissions
        $role->permissions()->detach();
    }

    return redirect()->route('admin.roles')->with('success', 'Role updated successfully.');
}

public function delete($id)
{
    // Find the role by id
    $role = Selected_role::findOrFail($id);

    // Check if any admin user is associated with this role
    $adminCount = Admin::where('selected_role_id', $id)->count();

    // If admin users exist for this role, show a message and prevent deletion
    if ($adminCount > 0) {
        return redirect()->route('admin.roles')->with('error', 'Role cannot be deleted as there are admin users assigned to this role.');
    }

    // If no admin users exist, delete the role
    $role->delete();

    return redirect()->route('admin.roles')->with('success', 'Role deleted successfully.');
}



    //user

    public function adminlist()
{
    abort_if(Gate::denies('user read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    $admins = Admin::with('selected_role')->get();

    return view('admin.userlist', compact('admins'));
}

    // Show the form for creating a new admin
    public function admininsertpage()
    {
        abort_if(Gate::denies('user write'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Selected_role::all(); // Fetch all available roles
        return view('admin.createuser', compact('roles'));
    }

    // Store a newly created admin in storage
    public function admininsert(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email',
        'whatsapp' => 'nullable|string|max:255',
        'selected_role_id' => 'required|exists:selected_roles,id',
        'password' => 'required|confirmed|min:8',
    ]);

    $admin = new Admin();
    $admin->name = $request->input('name');
    $admin->email = $request->input('email');
    $admin->whatsapp = $request->input('whatsapp');
    $admin->selected_role_id = $request->input('selected_role_id');
    $admin->password = Hash::make($request->input('password'));
    $admin->save();

    return redirect()->route('admin.userlist')->with('success', 'Admin added successfully!');
}


    // Show the form for editing an existing admin
    public function edit_admin_page($id)
    {
        abort_if(Gate::denies('user write'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        $admin = Admin::findOrFail($id);
        $roles = Selected_role::all(); // Fetch all available roles
        return view('admin.edituser', compact('admin', 'roles'));
    }

    // Update an existing admin in storage
    public function update_admin_page(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'whatsapp' => 'nullable|string|max:255',
            'selected_role_id' => 'required|exists:selected_roles,id',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->whatsapp = $request->whatsapp;
        $admin->selected_role_id = $request->selected_role_id;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect()->route('admin.userlist')->with('success', 'Admin updated successfully.');
    }

    // Delete an admin
    public function admindelete($id)
    {

        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.userlist')->with('success', 'Admin deleted successfully.');
    }
}
