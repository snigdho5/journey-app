<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AddActivityController;

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

Route::post("login-email", [UserController::class, 'login']);
Route::post("register", [UserController::class, 'register']);


Route::get("test", [UserController::class, 'index']);
Route::post("login", [UserController::class, 'otpLogin']);
Route::post("verify-otp", [UserController::class, 'verifyOtp']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    //
    Route::post("update-user", [UserController::class, 'updateUser']);
    Route::post("logout", [UserController::class, 'logout']);
    Route::get("activities", [ActivityController::class, 'index']);
    Route::post("add-activity", [AddActivityController::class, 'create']);
});
