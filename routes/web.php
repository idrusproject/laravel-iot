<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\IotconfigController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\MqttController;
use PhpMqtt\Client\Facades\MQTT;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes              
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/admin');
});

Route::middleware(['guest'])->group(function () {
    // Routing For guest user
    Route::get('register', [SignupController::class, 'index'] );
    Route::post('register', [SignupController::class, 'store'] );
    Route::get('login', [LoginController::class, 'index'] )->name('login');
    Route::post('login', [LoginController::class, 'authenticate'] );
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'show'])->name('dashboard');
    Route::get('/history', [HistoryController::class, 'show'])->name('history');
    Route::get('/personal', [PersonalController::class, 'show'])->name('personal');
    Route::get('/iotconfig', [IotconfigController::class, 'show'])->name('iot.config');
    
    // Jquery for value in dashboard
    Route::get('dashboard/value1', [DashboardController::class, 'value1']);
    Route::get('dashboard/value2', [DashboardController::class, 'value2']);
    Route::get('dashboard/value3', [DashboardController::class, 'value3']);
    Route::get('dashboard/value4', [DashboardController::class, 'value4']);
    
    // Delete history logger
    Route::delete('/delete-all-data', [HistoryController::class, 'deleteAllData']);
    Route::delete('/delete/{id}', [HistoryController::class, 'deleteData']);

    // MQTT Config https://github.com/php-mqtt/laravel-client
    Route::post('/publish-mqtt', [MqttController::class, 'publish'])->name('publish-mqtt');
    Route::post('/publish-mqttCustom', [MqttController::class, 'publishCustom'])->name('publish-mqttCustom');  
    
    // MQTT Config "composer require bluerhinos/phpmqtt"
    Route::post('/toggle_relay1', [MqttController::class, 'toggle_relay1'])->name('toggle.relay1');
    Route::post('/toggle_relay2', [MqttController::class, 'toggle_relay2'])->name('toggle.relay2');
    Route::post('/toggle_relay3', [MqttController::class, 'toggle_relay3'])->name('toggle.relay3');
    Route::post('/toggle_relay4', [MqttController::class, 'toggle_relay4'])->name('toggle.relay4');
    Route::post('/toggle_relays', [MqttController::class, 'toggle_relays'])->name('toggle.relays');

    Route::post('/logout', [LoginController::class, 'logout'] )->name('logout');
});


// Email verification
Route::get('/email/verify', function () {
    return view('emailVer');
})->middleware('auth')->name('verification.notice');
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::post('signout', [LoginController::class, 'logout'] )->name('signout');
