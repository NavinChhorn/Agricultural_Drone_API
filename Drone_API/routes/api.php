<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
                        Authentication,
                        DroneController,
                        MapController,
                        PlanController,
                        };

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

// ============== PROTECT THE ROUTES ===========================
Route::middleware("auth:sanctum")->group(function(){
    // DRONE ====================
    Route::resource("drones", DroneController::class);
    Route::get('drones/{id}/location', [DroneController::class, "getDroneLocation"]);

    // MAP ====================
    Route::prefix("maps")->group(function(){
        Route::get('/',[MapController::class,'index']);
        Route::get('/{province_name}/{farm_id}',[MapController::class,'getMap']);
        Route::delete('/{province_name}/{id}',[MapController::class,'deleteMap']);
        Route::post('/{province_name}/{id}',[MapController::class,'addMap']);
    });

    // PLAN =============================================
    Route::prefix('plans')->group(function(){
        Route::post('/plan',[PlanController::class,'store']);
        Route::get('/{plan_name}',[PlanController::class,'show']);
    });
    
    // LOGOUT ====================
    Route::post('/logout',[Authentication::class,'logout']);
});

// ============== UPDATE DRONE STATUS ====================
Route::put("drones/{id}/status", [DroneController::class, "updateDroneStatus"]);

// ============== INSTRUCTIONS ====================
Route::get("/instructions", [DroneController::class, "getInstructions"]);

// ============== AUTHENTICATION ===========================
Route::post('/register',[Authentication::class,'register']);
Route::post('/login',[Authentication::class,'login']);

