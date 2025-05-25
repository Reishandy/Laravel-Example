<?php

use App\Models\Aircraft;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hello', [
        'data' => 'something',
        'name' => 'Michiru'
    ]);
});

Route::get('/what', function () {
    return view('what');
});

Route::get('/aircraft', function () {
    return view('aircraft', ['aircraft' => Aircraft::all()->sortBy('type')]); // all() is for select *
});

Route::get('/aircraft/{id}', function ($id){
    // Laravel's Array operator
    $aircraft_details = Aircraft::find($id);
    if (! $aircraft_details) abort(404);

    return view('aircraft-details', ['aircraft_details' => $aircraft_details]);
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/api', function () {
    return [
        'message' => 'ok',
        'laravel' => '12'
    ];
});
