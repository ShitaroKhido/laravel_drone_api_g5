<?php

use App\Http\Controllers\DroneController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\MapPictureController;
use App\Http\Controllers\PlanController;
use App\Models\Drone;
use App\Models\Instruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/upload', [DroneController::class, 'sendImage']);

// update  instrct drone by id 
Route::put('/drones/{id}', [DroneController::class, 'instructDroneById']);
// Instruction 
Route::get('/instruction/{id}', [InstructionController::class, 'getDroneInstruction']);
// plan name 
Route::get('/plan/{name}', [PlanController::class, 'reqestPlanName']);




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/download/{location}/{id}', [DroneController::class, 'downloadImg']);
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
