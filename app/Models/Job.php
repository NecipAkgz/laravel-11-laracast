<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job {
    public static function all(): array {
        return [
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
    }

    public static function find(int $id): array {
        $job = Arr::first(self::all(), fn($job) => $job['id'] == $id);

        return $job ?? [];
    }
}
