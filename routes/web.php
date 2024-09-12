<?php

use Illuminate\Support\Facades\Route;
use App\Models\Jobs;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Jobs::with('employer')->latest()->cursorPaginate(10);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required','min:3'],
        'salary' => ['required'],
    ]);

    Jobs::create([
        'career' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Jobs::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
