<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (request()->header('SECRET') == env('SECRET')) {
            return $next($request);
        }
        return response()->json(['error' => request()->header('SECRET')], Response::HTTP_UNAUTHORIZED);
    }
}
