<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(! auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'authFailed' => 'Invalid credentials'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('home')->with('success' ,'Welcome back');
    }

    public function destroy(Request $request)
    {
        $name = auth()->user()->name;

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('info', 'Goodbye ' . $name);
    }
}
