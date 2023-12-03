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

        // Allowed User Groups That has Access to the Admin Panel
        $allowedUserGroups = ['moderator', 'administrator', 'manager'];

        // Check if users is admin
        if (auth()->check() && in_array(auth()->user()->userGroup, $allowedUserGroups)) {
            return $next($request);
        }
        abort(403, 'Unauthorized User');
    }
}
