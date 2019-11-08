<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use App\User;
use App\Address;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => \Hash::make(Str::random(10))
    ];
});

$factory->state(User::class, 'unverified', [
        'role_id' => function () {
            return factory(Role::class)->state('unverified')->create()->getKey();
        },
    ]);


$factory->state(User::class, 'administrator', [
        'role_id' => function () {
            return factory(Role::class)->state('administrator')->create()->getKey();
        },
    ]);


$factory->state(User::class, 'editor', function (Faker $faker) {
    return [
        'role_id' => function () {
            return factory(Role::class)->state('editor')->create()->getKey();
        },
    ];
});