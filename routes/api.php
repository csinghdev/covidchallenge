<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CovidDataAnalysisController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api'])->group(function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me'])->middleware('log.route');
    Route::post('register', [RegistrationController::class, 'register']);

    Route::get('get_date_info', [CovidDataAnalysisController::class, 'getDateInfo']);
    Route::get('get_state_info', [CovidDataAnalysisController::class, 'getStateInfo']);
    Route::get('pinpoint_state', [CovidDataAnalysisController::class, 'pinpointState']);
    Route::get('pinpoint_info', [CovidDataAnalysisController::class, 'pinpointInfo']);
});
