<?php

namespace App\Services;

use App\Exceptions\AppError;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginService{
    public function execute(array $data){
        // Log::debug('loginservice');

        if(!$token = auth()->attempt($data)){
            throw new AppError('Email or password invalid', 401);
        }

        return $this->responseToken($token);
    }

    private function responseToken($token){
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' =>  Auth::factory()->getTTL() * 60
        ];
    }
}