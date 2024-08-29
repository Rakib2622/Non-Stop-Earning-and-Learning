<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Selected_role;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            return $next($request);
        }

        // Load all roles with their associated permissions
        $roles = Selected_role::with('permissions')->get();

        // Prepare an array to store permissions associated with roles
        $permissionsArray = [];

        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissionsArray[$permission->title][] = $role->id;
            }
        }

        // Define gates for each permission based on roles
        foreach ($permissionsArray as $title => $roles) {
            Gate::define($title, function ($user) use ($roles) {
                // Check if the user's role is in the roles array for the permission
                return $user->selected_role && in_array($user->selected_role->id, $roles);
            });
        }

        return $next($request);
    }
}
 