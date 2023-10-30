<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StorePreviousUrl
{
    public function handle($request, Closure $next)
    {
        if (!$request->user() && !$request->ajax()) {
            session(['previousUrl' => $request->fullUrl()]);
        }

        return $next($request);
    }
}
