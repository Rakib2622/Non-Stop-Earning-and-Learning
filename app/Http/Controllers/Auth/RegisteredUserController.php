<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Network;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
{
    $referral = $request->query('referral');
    return view('auth.register', ['referral' => $referral]);
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
    
        $referenceCode = Str::random(10);
    
        if (isset($request->reference)) {
            $parentUser = User::where('reference', $request->reference)->first();
    
            if ($parentUser) {
                $userId = User::insertGetId([
                    'name' => $request->name,
                    'email' => $request->email,
                    'language' => $request->language,
                    'country' => $request->country,
                    'whatsapp' => $request->whatsapp,
                    'reference' => $referenceCode,
                    'password' => Hash::make($request->password),
                    'role_id' => 1, 
                ]);
    
                Network::insert([
                    'reference' => $request->reference,
                    'user_id' => $userId,
                    'parent_user_id' => $parentUser->id,
                ]);
    
                // Add 1 Taka to the parent user's account in the Account table
                $parentAccount = Account::firstOrNew(['user_id' => $parentUser->id]);
                $parentAccount->amount += 1; // Add 1 Taka
                $parentAccount->save();
    
            } else {
                return back()->with('error', 'Please enter a valid Referral Code!');
            }
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'language' => $request->language,
                'country' => $request->country,
                'whatsapp' => $request->whatsapp,
                'reference' => $referenceCode,
                'password' => Hash::make($request->password),
                'role_id' => 1,
            ]);
        }
    
        return back()->with('success', 'Registration Completed Successfully');
    }
    


}
