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
Route::post('/upload', [DroneController::class, 'sendImage']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Get Map:
    Route::resource('/map_pictures', MapPictureController::class);
    // Get Plan:
    Route::resource('/plans', PlanController::class);
    // Get drone location with ID:
    Route::get('/drone/{id}/location', [DroneController::class, 'getDroneLocation']);
    // Drone resources:
    Route::resource('/drone', DroneController::class)->except(['create']);
    // Logout:
    Route::get('/logout', [AuthController::class, 'logout']);
});
