<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id'     => 1,
                'title'  => 'Web Developer',
                'salary' => '$100,000',
            ],
            [
                'id'     => 2,
                'title'  => 'Web Designer',
                'salary' => '$80,000',
            ],
            [
                'id'     => 3,
                'title'  => 'Graphic Designer',
                'salary' => '$70,000',
            ]
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id'     => 1,
            'title'  => 'Web Developer',
            'salary' => '$100,000',
        ],
        [
            'id'     => 2,
            'title'  => 'Web Designer',
            'salary' => '$80,000',
        ],
        [
            'id'     => 3,
            'title'  => 'Graphic Designer',
            'salary' => '$70,000',
        ]
    ];
    $job  = Arr::first($jobs, fn($job) => $job['id'] == $id);
    return view('job', compact('job'));
});

Route::get('/contact', function () {
    return view('contact');
});
