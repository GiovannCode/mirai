<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        //Valida el token de la sesion jwt
        $token = session('token');

        if (!$token) {
            return redirect('/')->with('error', 'No autenticado');
        }

        return $next($request);
    }
}
