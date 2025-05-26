<?php

use App\Models\Aircraft;
use App\Models\Manufacturer;
use App\Models\Tag;
use App\Models\TypePrefix;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/api', function () {
    return [
        'message' => 'ok',
        'laravel' => '12'
    ];
});

// Aircraft routes
// Index
Route::get('/aircraft', function () {
    // Eager load with('relationship name)
    $aircafts = Aircraft::with('manufacturer')->latest()->paginate(10);

    return view('aircrafts.index', ['aircrafts' => $aircafts]); // ->sortBy('type') for sort
});

// Create
Route::get('/aircraft/create', function () {
    $typePrefixes = TypePrefix::all();
    $manufacturers = Manufacturer::all()->sortBy('name');
    $tags = Tag::all()->sortBy('name');

    return view('aircrafts.create', [
        'typePrefixes' => $typePrefixes,
        'manufacturers' => $manufacturers,
        'tags' => $tags
    ]);
});

// Show
Route::get('/aircraft/{id}', function ($id) {
    $aircraft = Aircraft::with('manufacturer', 'tags')->findOrFail($id);

    return view('aircrafts.show', ['aircraft' => $aircraft]);
});

// Edit
Route::get('/aircraft/{id}/edit', function ($id) {
    $typePrefixes = TypePrefix::all();
    $manufacturers = Manufacturer::all()->sortBy('name');
    $tags = Tag::all()->sortBy('name');
    $aircraft = Aircraft::with('manufacturer', 'tags')->findOrFail($id);

    return view('aircrafts.edit', [
        'typePrefixes' => $typePrefixes,
        'manufacturers' => $manufacturers,
        'tags' => $tags,
        'aircraft' => $aircraft
    ]);
});

// Store
Route::post('/aircraft', function () {
    // Update the code first
    $typePrefixes = TypePrefix::all();
    $fullCode = strtoupper($typePrefixes[request('type')] . request('code'));
    request()->merge(['code' => $fullCode]); // Use merge to update

    // Validate
    request()->validate([
        'manufacturer_id' => ['required', 'exists:manufacturers,id'],
        'code' => ['required', 'unique:aircraft,code', 'regex:/^[A-Z\/\-]+-\d+$/', 'max:16'], // For regex number after -
        'name' => ['required', 'max:64'],
        'type' => ['required', 'in:' . implode(',', array_keys($typePrefixes))],
        'tags' => ['required', 'array', 'min:1'],
        'tags.*' => ['exists:tags,id'] // content of array
    ]);

    // Create aircraft entry
    $aircraft = Aircraft::create([
        'manufacturer_id' => request('manufacturer_id'),
        'code' => $fullCode,
        'name' => request('name'),
        'type' => request('type')
    ]);

    // Assign tags
    if (request('tags')) {
        $aircraft->tags()->sync(request('tags'));
    }

    return redirect('/aircraft');
});

// Update
Route::patch('/aircraft/{id}', function ($id) {
    $typePrefixes = TypePrefix::all();
    $fullCode = strtoupper($typePrefixes[request('type')] . request('code'));
    request()->merge(['code' => $fullCode]); // Use merge to update
    $aircraft = Aircraft::findOrFail($id);

    // Validate
    request()->validate([
        'manufacturer_id' => ['required', 'exists:manufacturers,id'],
        'code' => ['required', 'regex:/^[A-Z\/\-]+-\d+$/', 'max:16'], // For regex number after -
        'name' => ['required', 'max:64'],
        'type' => ['required', 'in:' . implode(',', array_keys($typePrefixes))],
        'tags' => ['required', 'array', 'min:1'],
        'tags.*' => ['exists:tags,id'] // content of array
    ]);

    // Authorize (not now)

    // Update
    $aircraft->update([
        'manufacturer_id' => request('manufacturer_id'),
        'code' => $fullCode,
        'name' => request('name'),
        'type' => request('type')
    ]);

    if (request('tags')) {
        $aircraft->tags()->sync(request('tags'));
    }

    return redirect('/aircraft/' . $aircraft->id);
});

// Destroy
Route::delete('/aircraft/{id}', function ($id) {
    // Authorize (not now)

    // Delete
    $aircraft = Aircraft::findOrFail($id)->delete();

    return redirect('/aircraft');
});

// Manufacturer routes
// Show
Route::get('/manufacturer/{id}', function ($id) {
    $manufacturer = Manufacturer::with('aircrafts')->findOrFail($id);

    return view('manufacturers.show', ['manufacturer' => $manufacturer]);
});
