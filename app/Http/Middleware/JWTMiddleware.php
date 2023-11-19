<?php

namespace App\Http\Middleware;

use App\Exceptions\AppError;
use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware{
    public function handle($request, Closure $next){
        try{
            JWTAuth::parseToken()->authenticate();
            return $next($request);
        }catch( JWTException $exception){
            if($exception instanceof TokenInvalidException){
                throw new AppError('Invalid token', 401);
            }

            if($exception instanceof TokenExpiredException){
                throw new AppError('Expired token', 401);
            }

            throw new AppError($exception->getMessage(), 500);
        }
    }
}