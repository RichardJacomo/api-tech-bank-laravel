<?php

namespace App\Http\Controllers;

use App\Http\Requests\{CreateUserRequest, DepositRequest};
use App\Models\User;
use App\Services\CreateUserService;
use App\Services\DepositService;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;
// Log::debug($users); //used to debug the application

class UserController extends Controller{

    public function store(CreateUserRequest $request){
        $createUserService = new CreateUserService();
        return $createUserService->execute($request->all());
    }

    public function index(){
        $users = User::all();
        return $users;
    }

    public function show($id){
        $user = User::find($id);
        return $user;
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return $user;
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return $user;
    }

    public function deposit(DepositRequest $request){
        $createDepositService = new DepositService();

        $value = $createDepositService->execute(auth()->user()->id, $request->value);

        return response()->json(['message' => "Your new balance is R$$value"]);
    }
}