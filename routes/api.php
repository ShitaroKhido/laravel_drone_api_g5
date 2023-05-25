<?php

use App\Http\Controllers\DroneController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MapPictureController;
use App\Http\Controllers\PlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('drones', DroneController::class);
Route::resource('map_pictures', MapPictureController::class);
Route::resource('plans', PlanController::class);
Route::get('/drones/{id}/location', [DroneController::class, 'getDroneLocation']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});
