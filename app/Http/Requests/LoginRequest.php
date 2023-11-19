<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest{

    public function authorize(): bool{
        return true; //sempre deixar como true enquanto não for implementado
    }

    public function rules(): array{
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }
}
