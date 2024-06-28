<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller {
    public function index() {
        $jobs = Job::with('employer')->paginate(5);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create() {
        return view('jobs.create');
    }

    public function show(Job $job) {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function store() {
        $validated = request()->validate([
            'title'  => 'required|min:3|max:255',
            'salary' => 'required|min:3|max:255',
        ]);

        Job::create([...$validated, 'employer_id' => 1]);
    }

    public function edit(Job $job) {
        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    public function update(Job $job) {
        // validate
        $validated = request()->validate([
            'title'  => 'required|min:3|max:255',
            'salary' => 'required|min:3|max:255',
        ]);

        // authorize

        // update
        $job->update($validated);

        // redirect
        return redirect('/jobs/' . $job->id)->with('success', 'Job updated');
    }

    public function destroy(Job $job) {
        $job->delete();
        return redirect('/jobs')->with('success', 'Job deleted');
    }
}
