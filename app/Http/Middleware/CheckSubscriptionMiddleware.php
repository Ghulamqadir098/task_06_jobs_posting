<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscriptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
// Ensure the user is authenticated
if (Auth::check()) {
    $user = Auth::user();
    
    // Check if the user has an active subscription for the given product and price
    if ($user->subscribed('prod_QpqpJfScjKxVAM')) {
        dd("hello");
        return $next($request); // Allow access if the user is subscribed
    }
}

 // If no role matches, abort with 403
 abort(403, 'You are not Subscribed to Price');
        
    }
}
