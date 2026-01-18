<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in
        if (!auth()->check()) {
            abort(403, 'You must be logged in to access this area');
        }

        // Check if user has admin role
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized access - Admin only');
        }

        return $next($request);
    }
}