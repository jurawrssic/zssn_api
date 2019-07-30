<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Inventory::class, function (Faker $faker) {
    return [
        'qtyWater' => $faker->numberBetween(0, 10),
        'qtyFood' => $faker->numberBetween(0, 10),
        'qtyMedication' => $faker->numberBetween(0, 10),
        'qtyAmmo' => $faker->numberBetween(0, 10)
    ];
});