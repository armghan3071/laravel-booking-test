<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Api routes with Santum
Route::prefix('api')->group(function () {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return response()->json($request->user());
    });
    Route::middleware('auth:sanctum')->get('/export/users', [ExportController::class, 'exportCsv']);
});

