<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'hello')->name('home');

// Aircraft routes
//Route::resource('aircraft', AircraftController::class)->middleware('auth');
Route::controller(AircraftController::class)->group(function () {
    Route::get('/aircraft', 'index');

    Route::get('/aircraft/create', 'create')->middleware('auth');

    // Use wildcard:column and Eloquent type to fetch by that column (replace id)
    Route::get('/aircraft/{aircraft:code}', 'show');

    Route::get('/aircraft/{aircraft:code}/edit', 'edit')
        ->middleware('auth')
        ->can('update', 'aircraft');

    Route::post('/aircraft', 'store');

    Route::patch('/aircraft/{aircraft:code}', 'update')
        ->middleware('auth')
        ->can('update', 'aircraft');

    Route::delete('/aircraft/{aircraft:code}', 'destroy')
        ->middleware('auth')
        ->can('delete', 'aircraft');
});

// Manufacturer routes
Route::resource('manufacturer', ManufacturerController::class, [
    'only' => ['index', 'show']
]);

// Auth
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
