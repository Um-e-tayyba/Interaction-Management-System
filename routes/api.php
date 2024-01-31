<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\InteractionReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::middleware('api')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth:sanctum', 'throttle:15,1']] ,function () {
    Route::apiResource('interactions', InteractionController::class);
    Route::post('simulate-interaction/{label}', [InteractionReportController::class, 'simulateInteraction'])->name('report.simulate-interaction');
    Route::get('interaction-stats', [InteractionReportController::class, 'interactionStats'])->name('report.interaction-stats');
    Route::get('user-interaction-stats', [InteractionReportController::class, 'userInteractionStats'])->name('report.user-interaction-stats');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

});


