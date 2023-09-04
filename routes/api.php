<?php

use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/Zygmunt/50531/people',[PersonController::class, 'index']);
Route::post('/Zygmunt/50531/people',[PersonController::class, 'store']);
Route::get('/Zygmunt/50531/people/{id}',[PersonController::class, 'show']);
Route::get('/Zygmunt/50531/people/{id}/edit',[PersonController::class, 'edit']);
Route::put('/Zygmunt/50531/people/{id}/edit',[PersonController::class, 'update']);
Route::delete('/Zygmunt/50531/people/{id}/delete',[PersonController::class, 'destroy']);