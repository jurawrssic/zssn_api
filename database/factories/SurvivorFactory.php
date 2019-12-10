<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use \App\Models\Survivor;
use \App\Models\Inventory;
use Database\Factories\InventoryFactory;
use Faker\Generator as Faker;

$factory->define(\App\Models\Survivor::class, function (Faker $faker) {
    $gender = $faker->randomElement(['Male', 'Female']);
    return [
        'name' => $faker->name($gender),
        'age' => $faker->numberBetween(1,99),
        'gender' => $gender,
        'lastLocation' => ['['.'latitude' => $faker->latitude(-90, 90).',', 'longitude' => $faker->latitude(-180, 180).']'],

        'infected'=> 0,
        'infectedReports' => 0,
        'inventory_id' => factory(Inventory::class)->create()
    ];
});