<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hello');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/what', function () {
    return view('what');
});

Route::get('/api', function () {
    return [
        'message' => 'ok',
        'laravel' => '12'
    ];
});
