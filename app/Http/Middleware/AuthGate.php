<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Selected_role;
use Illuminate\Support\Facades\Gate;

class AuthGate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if(!$user) {
            return $next($request);
        }

        $roles = Selected_role::with('permissions')->get();

        $permissionsArray = [];

        foreach($roles as $role) {
            foreach($role->permissions as $permissions) {
                $permissionsArray[$permissions->title][] = $role->id;
            }
        }

        // dd($permissionsArray);

        foreach($permissionsArray as $title => $roles) {
            Gate::define($title, function ($user) use ($roles) {
                return count(array_intersect($user->selected_role->pluck('id')->toArray(), $roles)) > 0;
            });
        }

        return $next($request);
    }
}
