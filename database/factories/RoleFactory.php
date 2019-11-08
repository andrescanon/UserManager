<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;


$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->jobTitle,
        'slug' => $faker->unique()->slug
    ];
});

$factory->state(Role::class, 'administrator', [
    'name' => 'administrator',
    'slug' => 'administrator',
]);

$factory->state(Role::class, 'editor', [
    'name' => 'editor',
    'slug' => 'editor',
]);

$factory->state(Role::class, 'unverified', [
    'name' => 'unverified',
    'slug' => 'unverified',
]);