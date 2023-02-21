<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;

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

// Route::post('/dashboard',function(){
//     $data = array('a' => 1);
//     echo json_encode($data);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api_key'])->group(function () {
    Route::get('/dashboards',[DashboardController::class, 'get']);
    Route::post('/dashboard',[DashboardController::class, 'post']);
    Route::get('/histories',[HistoryController::class, 'get']);
    Route::post('/history',[HistoryController::class, 'post']);
});