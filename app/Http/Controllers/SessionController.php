<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class SessionController extends Controller
{
    //
    public function create(): Factory|View|Application
    {
        return view('auth.login');
    }
    #[NoReturn] public function store(): void
    {
        dd(request()->all());
    }
}
