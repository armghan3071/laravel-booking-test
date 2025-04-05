<?php

use App\Http\Controllers\Api\V1\BookingController;
use App\Http\Controllers\Api\V1\CustomerController;
use Illuminate\Support\Facades\Route;

// V1 Api
Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('bookings', BookingController::class);
});
