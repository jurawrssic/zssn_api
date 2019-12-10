<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Survivor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     * @return void
     */
    public function testHomepage()
    {
        $response = $this->get('/');
        $response->assertSee("Why does it always have to be some crazy, evil shit? Can't we for once just find a bakery? Maybe a working donut shop? A fully stocked dispensary-is that too much to ask?");
    }

    public function testNewSurvivorPage()
    {
        $response = $this->get('/storeSurvivor');
        $response->assertSee("Welcome to Murphytown!");
    }

    public function testListingSurvivorsPage()
    {
        $response = $this->get('/api/survivors');
        $response->assertSee("Listing of all registered survivors");
    }

    public function testTradePage()
    {
        $response = $this->get('/tradeItems');
        $response->assertSee("Trading items between healthy survivors.");
    }

    public function testReportsPage()
    {
        $response = $this->get('/reports');
        $response->assertSee("Report suspected survivor and check statistics.");
    }

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
    
    
}


