<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOnly
{
    // Allow only a logged-in admin session through.
    public function handle(Request $request, Closure $next)
    {
        if (! $request->session()->get('asya_admin')) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
