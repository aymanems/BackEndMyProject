<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\administratorLoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\notificationController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post( '/tcheckLogin', [administratorLoginController::class,'tcheckLoginAdministrator']);
Route::get('student/{email}', [StudentController::class,'index']);
Route::post('student/profile/image/{id}', [StudentController::class,'updateProfileImage']);
Route::get('/student/profile/getimage/{id}', [StudentController::class,'getProfileImage']);
Route::post('student/profile/changePass/{id}', [StudentController::class,'changePassword']);


// ########################################## Notification #####################################################3
Route::get('notifications', [notificationController::class,'index']);
Route::post('notifications/store/{id}', [notificationController::class,'store']);
Route::put('/notifications/{notification}', [notificationController::class,'markAsRead']);
