<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\ManufacturerController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'hello', ['data' => 'something', 'name' => 'Michiru']);
Route::view('/what', 'what');
Route::view('/welcome', 'welcome');

// Aircraft routes
Route::resource('aircraft', AircraftController::class);
//Route::controller(AircraftController::class)->group(function () {
//    Route::get('/aircraft', 'index');
//    Route::get('/aircraft/create', 'create');
//    // Use wildcard:column and Eloquent type to fetch by that column (replace id)
//    Route::get('/aircraft/{aircraft:code}', 'show');
//    Route::get('/aircraft/{aircraft:code}/edit', 'edit');
//    Route::post('/aircraft', 'store');
//    Route::patch('/aircraft/{aircraft:code}', 'update');
//    Route::delete('/aircraft/{aircraft:code}', 'destroy');
//});

// Manufacturer routes
Route::resource('manufacturer', ManufacturerController::class, [
    'only' => ['index', 'show']
]);
