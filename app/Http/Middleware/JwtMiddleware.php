<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $th) {
            $status = 'Token no disponible en solicitud';
            $returnCode = 401;

            if ($th instanceof TokenInvalidException) {
                $status = 'Token invalido';
                $returnCode = 400;
            }

            if($th instanceof TokenExpiredException){
                $status = 'Token expirado';
                $returnCode = 400;
            }

            return response()->json([
                'status' => $status,
            ], $returnCode);
        }
        return $next($request);
    }
}
