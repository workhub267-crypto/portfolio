<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
//        dd('gg');
        if (!$request->expectsJson()) {

            // Admin routes
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }

            // Professional and web routes use the same login page
            return route('login');
        }

        return null;
    }
}

