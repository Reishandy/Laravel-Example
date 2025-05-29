<?php

namespace App\Http\Controllers;

use App\Mail\AircraftAdded;
use App\Models\Aircraft;
use App\Models\Tag;
use App\Models\TypePrefix;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AircraftController extends Controller
{
    // GET
    public function index(): View
    {
        // Eager load with('relationship name)
        $aircafts = Aircraft::with('manufacturer')->latest()->paginate(10);

        return view('aircrafts.index', ['aircrafts' => $aircafts]); // ->sortBy('type') for sort

    }

    public function create(): View|RedirectResponse
    {
        $typePrefixes = TypePrefix::all();
        $manufacturer = Auth::user()->manufacturer;
        $tags = Tag::all()->sortBy('name');

        return view('aircrafts.create', [
            'typePrefixes' => $typePrefixes,
            'manufacturer' => $manufacturer,
            'tags' => $tags
        ]);
    }

    public function show(Aircraft $aircraft): View
    {
        // $aircraft = Aircraft::with('manufacturer', 'tags')->findOrFail($id);

        return view('aircrafts.show', ['aircraft' => $aircraft]);
    }

    public function edit(Aircraft $aircraft): View|RedirectResponse
    {
        // Auth if you're the owner, gate so instantly when on endpoint
        // Definition is in AppServiceProvider
        // Gate::authorize('aircraft', $aircraft);

        $typePrefixes = TypePrefix::all();
        $manufacturer = Auth::user()->manufacturer;
        $tags = Tag::all()->sortBy('name');

        return view('aircrafts.edit', [
            'typePrefixes' => $typePrefixes,
            'manufacturer' => $manufacturer,
            'tags' => $tags,
            'aircraft' => $aircraft
        ]);
    }

    // POST
    public function store(): RedirectResponse
    {
        // Update the code first
        $typePrefixes = TypePrefix::all();
        $fullCode = strtoupper($typePrefixes[request('type')] . request('code'));
        request()->merge(['code' => $fullCode]); // Use merge to update

        // Validate
        request()->validate([
            'manufacturer_id' => ['required', 'exists:manufacturers,id'],
            'code' => ['required', 'unique:aircraft,code', 'regex:/^[A-Z]+-\d+[A-Z]?$/', 'max:16'], // For regex number after -
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

        // Send email
        Mail::to($aircraft->manufacturer->user)->queue(
            new AircraftAdded($aircraft)
        );

        return redirect('/aircraft');
    }

    public function update(Aircraft $aircraft): RedirectResponse
    {
        // Authorize (not now)

        $typePrefixes = TypePrefix::all();
        $fullCode = strtoupper($typePrefixes[request('type')] . request('code'));
        request()->merge(['code' => $fullCode]); // Use merge to update

        // Validate
        request()->validate([
            'manufacturer_id' => ['required', 'exists:manufacturers,id'],
            'code' => ['required', 'regex:/^[A-Z]+-\d+[A-Z]?$/', 'max:16'], // For regex number after -
            'name' => ['required', 'max:64'],
            'type' => ['required', 'in:' . implode(',', array_keys($typePrefixes))],
            'tags' => ['required', 'array', 'min:1'],
            'tags.*' => ['exists:tags,id'] // content of array
        ]);

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

        return redirect('/aircraft/' . $aircraft->code);
    }

    public function destroy(Aircraft $aircraft): RedirectResponse
    {
        // Authorize (not now)

        // Delete
        $aircraft->delete();

        return redirect('/aircraft');
    }
}
