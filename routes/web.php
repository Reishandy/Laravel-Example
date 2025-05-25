<?php

use App\Models\Aircraft;
use App\Models\Manufacturer;
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
    // Btw get() is just select @
    $aircafts = Aircraft::with('manufacturer')->get(); // Eager load (also get the relationship)

    return view('aircraft', ['aircrafts' => $aircafts]); // ->sortBy('type') for sort
});

Route::get('/aircraft/{id}', function ($id){
    $aircraft = Aircraft::with('manufacturer')->with('tags')->find($id);
    if (! $aircraft) abort(404);

    return view('aircraft-details', ['aircraft' => $aircraft]);
});

// TODO: add manufacturer details
Route::get('/manufacturer/{id}', function ($id){
    $manufacturer = Manufacturer::with('aircrafts')->find($id);
    if (! $manufacturer) abort(404);

    return view('manufacturer-details', ['manufacturer' => $manufacturer]);
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
