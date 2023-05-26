<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProvinceController;

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
    Route::get('drones/{id}/location', [DroneController::class, "getDroneLocation"]);

    // MAP ====================
    Route::prefix("maps")->group(function(){
        Route::get('/',[MapController::class,'index']);
        Route::get('/{province_name}/{farm_id}',[MapController::class,'show']);
        Route::delete('/{province_name}/{id}',[ProvinceController::class,'destroy']);
        Route::post('/{province_name}/{id}',[ProvinceController::class,'addMap']);
    });

    // Route Plans =============================================
    Route::prefix('plans')->group(function(){
        Route::post('/plan',[PlanController::class,'store']);
        Route::get('/{name_plan}',[PlanController::class,'show']);
    });

    // LOGOUT ====================
    Route::post('/logout',[Authentication::class,'logout']);
});

// ============== UPDATE DRONE STATUS ====================
Route::put("drones/{id}/status", [DroneController::class, "updateDroneStatus"]);

// ============== INSTRUCTIONS ====================
Route::get("/instructions/{drone_id}", [DroneController::class, "getInstructions"]);

// ============== Authentication API ===========================
Route::post('/register',[Authentication::class,'register']);
Route::post('/login',[Authentication::class,'login']);

