<?php

use App\Http\Controllers\{AuthController, TransactionController, UserController};
use Illuminate\Support\Facades\Route;

// route that takes all logs from the application and renders them in an organized web page to facilitate the debug
// use Rap2hpoutre\LaravelLogViewer\LogViewerController;
// Route::get('logs', [LogViewerController::class, 'index']); 

// class that helps to debug the application:
// use Illuminate\Support\Facades\Log;
// Log::debug($users); 

// Users routes
Route::post('/users', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']);
Route::middleware(['id.exists','jwt.verify'])->group(function(){
    Route::patch('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::post('/users/{id}/deposit', [UserController::class, 'deposit']);
});
Route::middleware('id.exists')->group(function(){
    Route::get('/users/{id}', [UserController::class, 'show']);
});

// Login route
Route::post('/auth/login', [AuthController::class, 'login']);

// Transactions route
Route::middleware(['jwt.verify'])->group(function(){
    Route::post('/transactions', [TransactionController::class, 'create']);
});