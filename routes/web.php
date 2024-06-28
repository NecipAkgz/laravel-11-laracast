<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->paginate(5);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', [
        'job' => $job
    ]);
});

// Store
Route::post('/jobs', function () {
    $validated = request()->validate([
        'title'  => 'required|min:3|max:255',
        'salary' => 'required|min:3|max:255',
    ]);

    Job::create([...$validated, 'employer_id' => 1]);
});

// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', [
        'job' => $job
    ]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    // validate
    $validated = request()->validate([
        'title'  => 'required|min:3|max:255',
        'salary' => 'required|min:3|max:255',
    ]);

    $job = Job::findOrFail($id);

    // authorize

    // update
    $job->update($validated);

    // redirect
    return redirect('/jobs/' . $job->id)->with('success', 'Job updated');

});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);
    $job->delete();
    return redirect('/jobs')->with('success', 'Job deleted');
});

Route::get('/contact', function () {
    return view('contact');
});
