<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;


class JobsController extends Controller
{
    public function index(): Factory|View|Application
    {
        $jobs = Jobs::with('employer')->latest()->cursorPaginate(10);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('jobs.create');
    }

    public function store(): Application|Redirector|RedirectResponse
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        $job = Jobs::create([
            'career' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );

        return redirect('/jobs');
    }

    public function show(Jobs $job): Factory|View|Application
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Jobs $job): Application|Factory|View|Redirector|RedirectResponse
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Jobs $job): Application|Redirector|RedirectResponse
    {

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        $job->update([
            "career" => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/jobs/' . $job['id']);
    }

    public function destroy(Jobs $job): Application|Redirector|RedirectResponse
    {
        $job->delete();
        return redirect('/jobs');
    }
}
