<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\SpotVaccineController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function() {

    Route::controller(AuthController::class)->group(function(){
        Route::post('auth/login', 'login');
        Route::post('auth/logout', 'logout');
    });

    Route::controller(ConsultationController::class)->group(function(){
        Route::get('consultations', 'index');
        Route::post('consultations', 'requestConsultation');
        Route::post('consultations/{model}', 'respond');
    });

    Route::controller(SpotController::class)->group(function(){
        Route::get('spots', 'index');
        Route::get('spots/{model}', 'detail');
    });

    Route::controller(SpotVaccineController::class)->group(function(){
        Route::get('spot-vaccines', 'index');
    });
});