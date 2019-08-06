<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;
use App\Project;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'project_id' => factory(Project::class),
        'body' => $faker->sentence,
    ];
});
