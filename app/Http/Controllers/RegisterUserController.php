<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller {
    public function create() {
        return view('auth.register');
    }

    public function store() {
        $validated = request()->validate([
            'first_name' => 'required|min:3|max:255',
            'last_name'  => 'required|min:3|max:255',
            'email'      => 'required|email',
            'password'   => ['required', Password::min(6), 'confirmed'],
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect('/jobs');
    }
}
