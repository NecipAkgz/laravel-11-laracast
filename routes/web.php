<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->paginate(5);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('job.show', compact('job'));
});

Route::post('/jobs', function () {
    $validated = request()->validate([
        'title'  => 'required|min:3|max:255',
        'salary' => 'required|min:3|max:255',
    ]);

    Job::create($validated);
});

Route::get('/contact', function () {
    return view('contact');
});
