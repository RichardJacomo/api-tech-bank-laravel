<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Services\CreateTransactionService;

// use Illuminate\Support\Facades\Log;
// Log::debug($users); // this is used to debug the application

class TransactionController extends Controller{
    public function create(CreateTransactionRequest $request){
        $createTransactionService = new CreateTransactionService();
        return $createTransactionService->execute($request->all());
    }
}   