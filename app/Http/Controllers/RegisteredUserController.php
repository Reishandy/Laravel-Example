<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:2', 'max:32', 'regex:/^[a-zA-Z0-9\s._-]+$/'],
            'email' => ['required', 'email', 'unique:users', 'max:254'],
            'password' => ['required', 'confirmed', Password::min(8)->max(24)->letters()->numbers()] // confirmed needs password_confirmation
        ]);

        $attributes['name'] = trim($attributes['name']);
        $attributes['email'] = trim($attributes['email']);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
