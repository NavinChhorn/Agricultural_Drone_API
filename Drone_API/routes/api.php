<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// ============== Authentication API ===========================
Route::post('/register',[Authentication::class,'register']);
Route::post('/login',[Authentication::class,'login']);
Route::post('/logout',[Authentication::class,'logout']);

// DRONE ====================
Route::resource("drones", DroneController::class);

// MAP ====================
Route::resource("maps", MapController::class);