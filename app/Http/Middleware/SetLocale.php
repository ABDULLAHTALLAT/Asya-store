<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    // Read ar/en from the URL and switch the app language.
    public function handle(Request $request, Closure $next)
    {
        app()->setLocale($request->route('locale'));
        $request->route()->forgetParameter('locale'); // controllers do not need it

        return $next($request);
    }
}
