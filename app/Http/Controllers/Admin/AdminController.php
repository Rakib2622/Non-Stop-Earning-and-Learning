<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function studentlist()
{
    abort_if(Gate::denies('student read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    // Fetch all registered users
    $students = User::all();

    return view('admin.students', ['students' => $students]);
}
public function editStudent($id)
{
    abort_if(Gate::denies('student write'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    $student = User::findOrFail($id);
    return view('admin.editstudent', ['student' => $student]);
}

    public function updateStudent(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([
        'id'=> 'int',
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|unique:users,email,' . $id,
        'country' => 'nullable|string|max:255',
        'language' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255',
        'whatsapp' => 'nullable|string|max:255',
        'balance' => 'nullable|string|max:255',
        'team_leader_id'=> 'nullable|string|max:20',
        'trainer_id'=> 'nullable|string|max:20',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'=>'nullable|string|max:255'
    ]);

    // Fetch the student by ID
    $student = User::findOrFail($id);
    
    // Update the student with validated data
    $student->id = $request->input('id', $student->id);
    $student->name = $request->input('name', $student->name);
    $student->email = $request->input('email', $student->email);
    $student->country = $request->input('country', $student->country);
    $student->language = $request->input('language', $student->language); 
    $student->phone = $request->input('phone', $student->phone);
    $student->balance = $request->input('balance', $student->balance);
    $student->whatsapp = $request->input('whatsapp', $student->whatsapp);
    $student->team_leader_id = $request->input('team_leader_id', $student->team_leader_id);
    $student->trainer_id = $request->input('trainer_id', $student->trainer_id);
    $student->status = $request->input('status', $student->status);

    // Handle image upload
    // if ($request->hasFile('image')) {
    //     // Delete the old image if exists
    //     if ($user->image && Storage::exists('public/images/' . $user->image)) {
    //         Storage::delete('public/images/' . $user->image);
    //     }
        
    //     // Store the new image
    //     $path = $request->file('image')->store('public/images');
    //     $user->image = basename($path);
    // }

    // Save the changes
    $student->save();

    // Redirect back with a success message
    return redirect()->route('admin.students')->with('success', 'Student updated successfully!');
}

}
