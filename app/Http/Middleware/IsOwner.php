<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and is owner
        if ($request->user() && $request->user()->isOwner()) {
            return $next($request);
        }

        // Redirect to home if not owner
        return redirect('/')->with('error', 'You are not authorized to access this page.');
    }
}
