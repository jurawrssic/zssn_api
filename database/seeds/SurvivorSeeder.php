<?php

use Illuminate\Database\Seeder;

class SurvivorSeeder extends Seeder
{
    /**
     * Run the database seeds for Survivors.
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Survivor::class, 10)->create();
    }
}
