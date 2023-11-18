<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Services\CreateUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function store(CreateUserRequest $request)
    {
        $createUserService = new CreateUserService();
        return $createUserService->execute($request->all());
    }

    public function index()
    {
        $users = User::all();
        return $users;

    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return $user;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return $user;
    }
}