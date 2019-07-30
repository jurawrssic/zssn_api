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
    public function testSurvivorsIndex()
    {
        $response = $this->json('GET', '/api/survivors');
        $response->assertStatus(200);
    }

    public function testSurvivorsShow(){
        $response = $this->json('GET', '/api/survivors/{id}');
        $response->assertStatus(200);
    }

    public function testInventoryIndex(){
        $response = $this->json('GET', '/api/inventories');
        $response->assertStatus(200);
    }

    public function testAverageItems(){
        $response = $this->json('GET', '/api/reports/averageItems');
        $response->assertStatus(200);
    }

    public function testPercentage(){
        $response = $this->json('GET', '/api/reports/percentage');
        $response->assertStatus(200);
    }

    public function testLostPoints(){
        $response = $this->json('GET', '/api/reports/lostPoints');
        $response->assertStatus(200);
    }

    public function testSurvivorStore(){
        $survivor = factory(Survivor::class)->create();
        $json = $survivor->toJson();
        dd($json->input('lastLocation.latitude'));
        $response = $this->call('POST', '/api/survivors', ["name" => "Paola", "age" => 24, "gender" => "Female", ["lastLocation"]]);
        $response->assertStatus(200);
    }
}
