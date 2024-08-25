<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function showProfile(): View
    {
        $user = auth()->user();
        return view('frontend.after_login.profile', compact('user'));
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
    
}
