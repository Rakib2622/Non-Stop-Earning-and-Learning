<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user->status === 'active') {
            return $next($request);
        } else {
            // Redirect to the dashboard if the user is not active
            return redirect()->route('inactive_dashboard');
        }
    }
}
