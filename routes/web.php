<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Jobs;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Jobs::with('employer')->cursorPaginate(10);
    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = Jobs::all();
    $job = Jobs::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
