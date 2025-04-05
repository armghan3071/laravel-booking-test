<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});
Route::middleware('auth:sanctum')->get('/export/users', [ExportController::class, 'exportCsv']);

//V1 Api
Route::group(['prefix' => 'v1', "namespace" => "App\Http\Controllers\Api\V1"], function(){
    Route::apiResource("customers", CustomerController::class);
    Route::apiResource("bookings", BookingController::class);
});
