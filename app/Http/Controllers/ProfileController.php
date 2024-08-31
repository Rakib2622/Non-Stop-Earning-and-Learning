<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    

public function showProfile(): View
{
    $user = auth()->user();
        
    // Fetch the account record for the user
    $account = Account::where('user_id', $user->id)->first();

    // Calculate balance: If no account record, balance should be 0
    $balance = $account ? $account->amount : 0;

    return view('frontend.after_login.profile', compact('user', 'balance'));
}

   public function edit(Request $request): View
{
    $user = $request->user();
    return view('frontend.after_login.edit_profile', compact('user'));
}

    /**
     * Update the user's profile information.
     */
    public function updateProfile(ProfileUpdateRequest $request)
{
    $user = $request->user();

    // Update all fields from the request
    $user->fill($request->validated());

    // Handle file upload for profile image
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('profile_images', 'public');
        $user->image = $path;
    }

    $user->save();

    return Redirect::route('showprofile')->with('status', 'profile-updated');
}

public function adminshowProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.show', compact('admin'));
    }

    // Edit the admin profile
    public function adminedit()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    // Update the admin profile
    public function adminupdateProfile(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . Auth::id(),
            'whatsapp' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin = Auth::guard('admin')->user();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->whatsapp = $request->input('whatsapp');

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->input('password'));
        }

        $admin->save();

        return redirect()->route('admin.showprofile')->with('success', 'Profile updated successfully.');
    }
}
    
