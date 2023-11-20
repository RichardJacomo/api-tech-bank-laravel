<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\{User, Transaction};

class CreateTransactionService{
    public function execute(array $data){
        $payer = User::find($data['payer']);
        $payee = User::find($data['payee']);

        if(is_null($payer)){
            throw new AppError('Payer not found', 404);
        }

        if(is_null($payee)){
            throw new AppError('Payee not found', 404);
        }

        if($payer->type === 'Seller'){
            throw new AppError('Payer cannot be a seller', 403);
        }

        if($payer->balance < $data['value']){
            throw new AppError('Payer does not have enough balance', 403);
        }

        $payer->balance -= $data['value'];
        $payee->balance += $data['value'];

        $payer->save();
        $payee->save();

        return Transaction::create([
            'value' => $data['value'],
            'payer_id' => $payer->id,
            'payee_id' => $payee->id
        ]);
    }


}