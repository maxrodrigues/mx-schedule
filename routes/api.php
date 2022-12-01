<?php

use App\Http\Controllers\Api\v1\Auth\LoginController;
use App\Http\Controllers\Api\v1\Auth\RegisterController;
use App\Http\Controllers\Api\v1\Customer\CreateCustomerController;
use App\Http\Controllers\Api\v1\Customer\ListCustomerController;
use App\Http\Controllers\Api\v1\Service\CreateServiceController;
use App\Http\Controllers\Api\v1\Service\ListServiceController;
use Illuminate\Http\Request;
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

Route::post('register', [RegisterController::class, 'index'])->name('api.register');
Route::post('login', [LoginController::class, 'index'])->name('api.login');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});

// CUSTOMERS
Route::get('customer/', ListCustomerController::class);
Route::post('customer/create', CreateCustomerController::class);

// SERVICES
Route::get('services/', ListServiceController::class);
Route::post('service/create', CreateServiceController::class);
