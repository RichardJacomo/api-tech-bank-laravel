<?php

namespace App\Http\Middleware;

use App\Exceptions\AppError;
use App\Models\User;
use Closure;

class IdExistsMiddleware{
    public function handle($request, Closure $next){
        $id = $request->route('id');
        $user = User::find($id);
        if(is_null($user)){
            throw new AppError('User not found', 404);
        }
        return $next($request);
    }
}