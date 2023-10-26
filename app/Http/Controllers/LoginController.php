<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    public function index() {
        return Inertia::render('Login/Index');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($data)) {
            $user = User::where('email', $data['email'])->first();

            Auth::login($user, true);
            
            return redirect()->route('home');
        }

        return redirect()->route('connexion');
    }
}