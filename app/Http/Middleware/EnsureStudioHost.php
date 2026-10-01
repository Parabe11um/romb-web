<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureStudioHost
{
    public function handle(Request $request, Closure $next): Response
    {
        abort_if(strcasecmp($request->getHost(), config('personal.domain')) === 0, 404);

        return $next($request);
    }
}
