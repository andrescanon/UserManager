<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'label' => $faker->word,
        'company' => $faker->company,
        'country_code' => $faker->countryCode,
        'street' => $faker->streetAddress,
        'state' => $faker->citySuffix,
        'city' => $faker->city,
        'postcode' => $faker->postcode,
    ];
});

$factory->state(Address::class, 'primary', [
        'is_primary' => true,
    ]
);

$factory->state(Address::class, 'shipping', [
        'is_shipping' => true,
    ]
);

$factory->state(Address::class, 'billing', [
        'is_billing' => true,
    ]
);