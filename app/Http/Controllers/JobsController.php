<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;


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

        Jobs::create([
            'career' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    }

    public function show(Jobs $job): Factory|View|Application
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Jobs $job): Factory|View|Application
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
