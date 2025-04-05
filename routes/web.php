<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/connect', function () {
    $credentials = [
        'email' => 'admin@admin.com',
        'password' => 'password',
    ];
    if (! Auth::attempt($credentials)) {
        $user = new \App\Models\User;
        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('password');

        $user->save();
    }

    Auth::attempt($credentials);
    $user = Auth::user();
    $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);

    // TODO: can create more tokens
    return ['adminToken' => $adminToken];
});
