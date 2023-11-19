<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepositRequest extends FormRequest{

    public function authorize(): bool{
        return auth()->user()->id == $this->route('id');
    }

    public function rules(): array{
        return [
            'value' => 'required|numeric|gte:0.01',
        ];
    }
}
