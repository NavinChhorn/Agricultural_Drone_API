<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\DroneController;

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

// ============== PROTECT THE ROUTE ===========================
Route::middleware("auth:sanctum")->group(function(){
    
    // DRONE ====================
    Route::resource("drones", DroneController::class);

    // MAP ====================
    Route::resource("maps", MapController::class);
    
    // LOGOUT ====================
    Route::post('/logout',[Authentication::class,'logout']);
});

// ============== Authentication API ===========================
Route::post('/register',[Authentication::class,'register']);
Route::post('/login',[Authentication::class,'login']);

