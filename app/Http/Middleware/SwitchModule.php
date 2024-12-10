<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use SergiX44\Nutgram\Nutgram;
use Symfony\Component\HttpFoundation\Response;

class SwitchModule
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}