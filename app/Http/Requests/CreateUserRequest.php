<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest{
    
    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'email' => 'required | email | unique:users',
            'name' => 'required | string',
            'cpf' => 'required | string | unique:users',
            'password' => 'required | string | min:8',
            'type' => 'string',
            'balance' => 'numeric',
        ];
    }
}
