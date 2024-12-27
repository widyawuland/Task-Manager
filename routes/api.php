<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\TaskController as ApiTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource("/tasks", ApiTaskController::class);
});
// Route::apiResource("/tasks", ApiTaskController::class);

//route untuk login & logout api
Route::post("/Login",[LoginController::class,"Login"]);
Route::post("/Logout",[LoginController::class,"Logout"]);