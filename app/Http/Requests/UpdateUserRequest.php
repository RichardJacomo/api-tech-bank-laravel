<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest{
    
    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'email' => 'email | unique:users',
            'name' => 'string',
            'cpf' => 'string | unique:users',
            'password' => 'string | min:8',
            'type' => 'string',
            'balance' => 'numeric',
        ];
    }
}
