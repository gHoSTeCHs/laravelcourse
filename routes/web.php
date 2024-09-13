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
        'title' => ['required', 'min:3'],
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
    $job = Jobs::findOrFail($id);
    return view('jobs.show', ['job' => $job]);
});

Route::get('/jobs/{id}/edit', function ($id) {
    $job = Jobs::findOrFail($id);
    return view('jobs.edit', ['job' => $job]);
});

Route::patch('/jobs/{id}', function ($id) {
    // validate fields
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);
    // fetch job from db
    $job = Jobs::findOrFail($id);
    // Update job
    $job->update([
        "career" => request('title'),
        'salary' => request('salary')
    ]);
// Redirect to job
    return redirect('/jobs/'. $job->id);
});

// Delete
Route::delete('/jobs/{id}', function ($id) {
    Jobs::findOrFail($id)->delete();
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
