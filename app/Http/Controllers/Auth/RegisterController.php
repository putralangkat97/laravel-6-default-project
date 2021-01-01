<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        // Validation
        $this->validate($request, [
            'name'      => 'required|max:100',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|max:100'
        ]);

        // Create
        User::create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => Hash::make($request->get('password')),
        ]);

        // Sign In
        auth()->attempt($request->only('email', 'password'));

        // Redirect
        return redirect()
            ->route('dashboard');
    }
}
