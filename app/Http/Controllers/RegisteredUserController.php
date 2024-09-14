<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    //
    public function create(): Factory|View|Application
    {
        return view('auth.register');
    }

    public function store(): Application|Redirector|RedirectResponse
    {
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:256'],
            'password' => ['required', Password::min(6), 'confirmed']
        ]);

        $user = User::create($validatedAttributes);
        Auth::login($user);

        return redirect('/jobs');
    }
}
