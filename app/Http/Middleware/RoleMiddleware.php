<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            // Check if the user has any of the roles
            foreach ($roles as $role) {
                if ($user->roles->contains('name', $role)) {
                    return $next($request);
                }
            }

            // If no role matches, abort with 403
            abort(403, 'You are not allowed');
        }
    }
}
