<?php

use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/', 'contact');

Route::resource('jobs', JobsController::class);

