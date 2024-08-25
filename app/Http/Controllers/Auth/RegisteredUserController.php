<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
{
    $referralId = $request->query('referral');
    return view('auth.register', compact('referralId'));
}


    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', 'min:8'],
        'language' => ['required', 'string'],
        'country' => ['required', 'string'],
        'whatsapp' => ['required', 'string'],
        'reference' => ['nullable'],

    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'language' => $request->language,
        'country' => $request->country,
        'whatsapp' => $request->whatsapp,
        'reference' => $request->reference,
        'password' => Hash::make($request->password),
        'role_id' => 1, // Assuming '1' is the default role_id for new users
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect()->route('dashboard');
}

}
