<?php

namespace App\Http\Controllers;

use App\API\ApiError;
use App\API\ApiSucess;
use App\Models\Survivor;
use App\Models\Inventory;
use App\Http\Resources\SurvivorResource;
use App\Http\Resources\InventoryResource;
use Illuminate\Http\Request;

class SurvivorController extends Controller
{
    private $survivor;

    /**
     * Display a listing of the Survivor resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SurvivorResource::collection(Survivor::all());
    }

    /**
     * Store a newly created Survivor and belonging Inventory resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        try{            
            //creating inventory
            $inventory = Inventory::create([
                'qtyFood' => $request->input('inventory.qtyFood'),
                'qtyWater' =>  $request->input('inventory.qtyWater'),
                'qtyMedication' =>  $request->input('inventory.qtyMedication'),
                'qtyAmmo' =>  $request->input('inventory.qtyAmmo'),
            ]);

            //treating the lastLocation array
            $lastLocation = array($request->input('lastLocation.latitude'), $request->input('lastLocation.longitude'));
            $lastLocation = serialize($lastLocation);

            //creating survivor
            $survivor = Survivor::create([
                'name' => $request->name,
                'age' => $request->age,
                'gender' => $request->gender,
                'lastLocation' => $lastLocation, 
                'infected' => false, //standard value
                'infectedReports'=> 0, //standard value
                'inventory_id' => $inventory->id,
            ]);
        }catch(\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }
            return response()->json(ApiError::errorMessage('An error occurred', 1010), 500);
        }
    }

    /**
     * Display the specified Survivor resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $survivor = $this->survivor->find($id);
       //return (new SurvivorResource($survivor));
    }

    /**
     * Update the specified Survivor resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $survivorData = $request->all();
            $survivor = $this->survivor->find($id);
            $survivor->update($survivorData);
        }
        catch(\Exception $e)
        {
            if(config('app.debug'))
            {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 500);
            } 
            return response()->json(ApiError::errorMessage('An error ocurred', 1011), 500);
        }
    }

    /**
     * Remove the specified Survivor resource from storage.
     * @param  Survivor $survivor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survivor $survivor)
    {
        $survivor->delete();
        return response()->json(null, 204);
    }
    
    /**
    * Trade items between 2 survivors that are NOT infected 
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function trade(Request $request)
    {
        //Survivor 1 
        $survivor1 = Survivor::with('inventory')->get()->find($request->input('survivor1.id')); //retrieving survivor through it's id
        
        //ammount of each item that survivor1 wants to trade
        $tradeAmmount1 = array(
            'water' => $request->input('survivor1.qtyWater'),
            'food' => $request->input('survivor1.qtyFood'),
            'medication' => $request->input('survivor1.qtyMedication'),
            'ammo' => $request->input('survivor1.qtyAmmo')
        );
        
        //Survivor 2
        $survivor2 = Survivor::find($request->input('survivor2.id')); //retrieving survivor through it's id

        //ammount of each item that survivor2 wants to trade   
        $tradeAmmount2 = array(
            'water' => $request->input('survivor2.qtyWater'),
            'food' => $request->input('survivor2.qtyFood'),
            'medication' => $request->input('survivor2.qtyMedication'),
            'ammo' => $request->input('survivor2.qtyAmmo')
        );

        //calculating trade cost for both sides
        $tradeCost1 = self::calcTradeCost($tradeAmmount1);
        $tradeCost2 = self::calcTradeCost($tradeAmmount2);

        //retrieving each survivor's inventory
        $inventory1 = Inventory::find($survivor1->inventory_id);
        $inventory2 = Inventory::find($survivor2->inventory_id);
        
        //now checking if conditions to trade are satisfied
        if($survivor1->infected || $survivor2->infected){ //check if any survivor wanting to trade is infected
            return response()->json(ApiError::errorMessage('Infected survivor(s) cannot trade', 406));
        }else if($tradeCost1 != $tradeCost2){ //check if trade cost is the same for both sides
            return response()->json(ApiError::errorMessage('Invalid trade, not enough points', 406));
        //check if survivor has the ammount of items he wants to trade
        }else if($inventory1->checkInventory($tradeAmmount1) && $inventory2->checkInventory($tradeAmmount2)){ 
            //add item being purchased and deduct item being sold, survivor1
            $inventory1->qtyWater += ($tradeAmmount2['water'] - $tradeAmmount1['water']);
            $inventory1->qtyFood += ($tradeAmmount2['food'] - $tradeAmmount1['food']); 
            $inventory1->qtyMedication += ($tradeAmmount2['medication'] - $tradeAmmount1['medication']); 
            $inventory1->qtyAmmo += ($tradeAmmount2['ammo'] - $tradeAmmount1['ammo']); 
            $inventory1->update();
            //add item being purchased and deduct item being sold, survivor2
            $inventory2->qtyWater += ($tradeAmmount1['water'] - $tradeAmmount2['water']);
            $inventory2->qtyFood += ($tradeAmmount1['food'] - $tradeAmmount2['food']); 
            $inventory2->qtyMedication += ($tradeAmmount1['medication'] - $tradeAmmount2['medication']); 
            $inventory2->qtyAmmo += ($tradeAmmount1['ammo'] - $tradeAmmount2['ammo']);
            $inventory2->update();
        }
        return response()->json(ApiSucess::sucessMessage('Trade complete', 201));
    }

    /**
    * Calculate the price for each trade
    * @param  array $tradeAmmount
    * @return \Illuminate\Http\Response
    */
    public function calcTradeCost($tradeAmmount){
        $totalCost = 0;
        $cost = 4;
        foreach($tradeAmmount as $ammount){ //for each item ammount calculate it's cost
            $totalCost += $ammount * $cost;
            $cost--;
        }
        return $totalCost; //return total cost of the trade
    }

    /**
    * Increments the infectedReports attribute to the specified Survivor
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function reportAsInfected(Request $request){
        $survivor = Survivor::find($request->input('survivor.id')); //find the survivor you wish to report as infected
        $survivor->infectedReports += 1; //increment report
        if($survivor->infectedReports >= 3){ //check if survivor should be reported as infected or not
            $survivor->infected = true;
        }
        $survivor->update();
    }

    /**
    * Update the last known location to the specified Survivor
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function updateLastLocation(Request $request){
        $survivor = Survivor::find($request->input('survivor.id')); //find the survivor you wish to update location
        $lastLocation = array($request->input('lastLocation.latitude'), $request->input('lastLocation.longitude'));
        $lastLocation = serialize($lastLocation);
        $survivor->lastLocation = $lastLocation;
        $survivor->update();
    }

    /**
    * Calculate average item per Survivor
    * @return \Illuminate\Http\Response
    */
    public function averageItems(){
        $survivors = Survivor::where('infected', false)->get(); //get all not infected survivors
        $survivorsCount = $survivors->count(); //total of not infected survivors
        $totalItems = array( //initializing items array
            'totalWater' => 0.0, 
            'totalFood' => 0.0,
            'totalMedication' => 0.0,
            'totalAmmo' => 0.0
        );
        
        foreach($survivors as $s){ //getting every ammount of items from every survivor
            $totalItems['totalWater'] += $s->inventory->qtyWater;
            $totalItems['totalFood'] += $s->inventory->qtyFood;
            $totalItems['totalMedication'] += $s->inventory->qtyMedication;
            $totalItems['totalAmmo'] += $s->inventory->qtyAmmo;
        }

        $average = array( //calculate average item per survivor
            'avgWater' => (($totalItems['totalWater'])/$survivorsCount),
            'avgFood' => (($totalItems['totalFood'])/$survivorsCount),
            'avgMedication' => (($totalItems['totalMedication'])/$survivorsCount),
            'avgAmmo' => (($totalItems['totalAmmo'])/$survivorsCount)
        );

        return $average;        
    }


    /**
    * Calculate total lost points due to infected Survivors
    * @return \Illuminate\Http\Response
    */
    public function lostInventoryPoints(){
        $survivors = Survivor::where('infected', true)->get(); //get all infected survivors
        $totalLostPoints = 0; //initializing lostPoints
        
        foreach($survivors as $s){
            $totalLostPoints += $s->inventory->totalPoints(); //calculating points on each survivor's inventory
        }

        return $totalLostPoints;
    }

    /**
    * Calculate percentage of infected and not infected Survivors, also provides total Suvivors (infected or not)
    * @return \Illuminate\Http\Response
    */
    public function infectedPercentage(){
        $qtySurvivors = ($allSurvivors = Survivor::all())->count(); //get ammount of survivors total
        $qtyInfected = ($infected = Survivor::where('infected', true))->count(); //get ammount of infected survivors
        $qtyNotInfected = ($notInfected = Survivor::where('infected', false))->count(); //get ammount of not infected survivors

        $percentage = array( //calculating percentages
            'infectedPercentage' => ($qtyInfected / $qtySurvivors),
            'notInfectedPercentage' => ($qtyNotInfected / $qtySurvivors),
            'totalSurvivors' => $qtySurvivors
        );

        return $percentage;
    }
}
