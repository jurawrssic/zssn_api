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
       $survivor = Survivor::find($id);
       return (new SurvivorResource($survivor));
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
    * Trade items between 2 Survivors that are NOT infected 
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function trade(Request $request)
    {
        //retrieving survivors through it's id
        $survivor1 = Survivor::with('inventory')->get()->find($request->input('survivor1.id'));
        $survivor2 = Survivor::with('inventory')->get()->find($request->input('survivor2.id')); 
        
        //checking if survivors wanting to trade are infected or not
        $survivor1->isAllowedToTrade();
        $survivor2->isAllowedToTrade();

        //ammount of each item that survivor1 wants to trade   
        $tradeAmmount1 = array(
            'water' => $request->input('survivor1.qtyWater'),
            'food' => $request->input('survivor1.qtyFood'),
            'medication' => $request->input('survivor1.qtyMedication'),
            'ammo' => $request->input('survivor1.qtyAmmo')
        );

        //ammount of each item that survivor2 wants to trade   
        $tradeAmmount2 = array(
            'water' => $request->input('survivor2.qtyWater'),
            'food' => $request->input('survivor2.qtyFood'),
            'medication' => $request->input('survivor2.qtyMedication'),
            'ammo' => $request->input('survivor2.qtyAmmo')
        );

        //getting survivors inventory
        $inventory1 = Inventory::find($survivor1->inventory_id);
        $inventory2 = Inventory::find($survivor2->inventory_id);

        //checking if the survivor has the items he wants to trade
        //checking if the trade cost is equal for both sides
        //execute trade
        $inventory1->checkInventory($tradeAmmount1)->checkTradeCost($tradeAmmount1, $tradeAmmount2)->executeTrade($tradeAmmount1, $tradeAmmount2);
        //trade cost was already checked in the line above so, going straight to the trade
        $inventory2->checkInventory($tradeAmmount2)->executeTrade($tradeAmmount1, $tradeAmmount2);
        
        //updating inventories after the trade
        $inventory1->update();
        $inventory2->update();
    }

    /**
    * Report Survivor as infected
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function report($id){
        $survivor = Survivor::find($id); //find the survivor you wish to report as infected
        $survivor->reportAsInfected();
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
    * Return average item per Survivor
    * @return \Illuminate\Http\Response
    */
    public function averageItems(){
        return Survivor::calcAvgItems();
    }
    
    /**
    * Return total of lost points due to infected Survivors
    * @return \Illuminate\Http\Response
    */
    public function lostPoints(){
        return Survivor::calcLostPoints();
    }

    /**
    * Return percentage of infected and not infected Survivors, also provides total Suvivors (infected or not)
    * @return \Illuminate\Http\Response
    */
    public function infectedPercentage(){
        return Survivor::calcInfectedPercentage();
    }
}