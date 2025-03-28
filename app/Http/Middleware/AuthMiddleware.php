<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * @throws ValidationException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->exists('auth')) {
            return $next($request);
        } else {
            return redirect(route('login'));
        }
    }
}
