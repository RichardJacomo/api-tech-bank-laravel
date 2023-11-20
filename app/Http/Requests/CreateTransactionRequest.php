<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest{
    
    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'value' => 'required | numeric | gt:0.01',
            'payer' => 'required | string',
            'payee' => 'required | string',
        ];
    }
}
