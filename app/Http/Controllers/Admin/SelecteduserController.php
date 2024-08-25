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
        abort_if(Gate::denies('role_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Selected_role::all();

        return view('admin.roles', compact('roles')); // Adjust view path as needed
    }

    // Show the form to insert a new role
    public function insertpage()
    {
        return view('admin.create_roles'); // Adjust view path as needed
    }

    // Handle the insertion of a new role
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'amount' => 'required|numeric|min:0',
        ]);

        Selected_role::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'amount' => $request->input('amount'),
        ]);

        return redirect()->route('admin.roles')->with('success', 'Role added successfully.');
    }

    // Show the form to edit an existing role
    public function edit_role_page($id)
    {
        $role = Selected_role::findOrFail($id);
        return view('admin.update_roles', compact('role')); // Adjust view path as needed
    }

    // Handle the update of an existing role
    public function update_role_page(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'amount' => 'required|numeric|min:0',
        ]);

        $role = Selected_role::findOrFail($id);
        $role->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'amount' => $request->input('amount'),
        ]);

        return redirect()->route('admin.roles')->with('success', 'Role updated successfully.');
    }

    public function delete($id)
    {
        $role = Selected_role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles')->with('success', 'Role deleted successfully.');
    }


    //user

    public function adminlist()
    {
        $admins = Admin::with('selected_role')->get(); // Fetch all admins with their roles
        return view('admin.userlist', compact('admins'));
    }

    // Show the form for creating a new admin
    public function admininsertpage()
    {
        $roles = Selected_role::all(); // Fetch all available roles
        return view('admin.createuser', compact('roles'));
    }

    // Store a newly created admin in storage
    public function admininsert(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email',
        'whatsapp' => 'nullable|string|max:15',
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
