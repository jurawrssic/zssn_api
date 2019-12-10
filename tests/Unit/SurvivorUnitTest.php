<?php

namespace Tests\Unit;

use Tests\TestCase;
use \App\Models\Survivor;
use \App\Models\Inventory;
use Database\Factories\SurvivorFactory;
use Database\Factories\InventoryFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SurvivorTest extends TestCase
{
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
}
