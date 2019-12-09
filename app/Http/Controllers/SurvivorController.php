<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\API\ApiError;
use App\API\ApiSucess;
use App\Models\Survivor;
use App\Models\Inventory;
use App\Http\Resources\SurvivorResource;
use App\Http\Resources\InventoryResource;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;

class SurvivorController extends Controller
{
    private $survivor;

    /**
     * Display a listing of the Survivor resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $survivors = Survivor::with('inventory')->get();
        
        // $perPage = 15;
        // $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // $currentPageItems = $survivors->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        // $paginatedItems= new LengthAwarePaginator($currentPageItems , count($survivors), $perPage);
        // $paginatedItems->setPath('/survivors');
 
        // return view('survivors', ['survivors' => $paginatedItems]);
        
        return view('survivors', compact('survivors'));
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
                'qtyWater' =>  $request->input('inputQtyWater'),
                'qtyFood' => $request->input('inputQtyFood'),
                'qtyMedication' =>  $request->input('inputQtyMedication'),
                'qtyAmmo' =>  $request->input('inputQtyAmmo')
            ]);

            $lastLocation = "[".$request->input('inputLatitude').",".$request->input('inputLongitude')."]";

            //creating survivor
            $survivor = Survivor::create([
                'name' => $request->input('inputNameSurvivor'),
                'age' => $request->input('inputAgeSurvivor'),
                'gender' => $request->input('genderSelect'),
                'lastLocation' => $lastLocation, 
                'infected' => false, //standard value
                'infectedReports'=> 0, //standard value
                'inventory_id' => $inventory->id
            ]);
        }catch(\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }
            return response()->json(ApiError::errorMessage('An error occurred', 1010), 500);
        }
        return Redirect::route('storeSurvivor')->with('toast_success', 'Survivor sucessfully added!');
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
            $survivor = Survivor::find($id)->update($request->all());
            $survivor->save();
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
        $survivor1 = Survivor::with('inventory')->get()->find($request->input('id1'));
        $survivor2 = Survivor::with('inventory')->get()->find($request->input('id2'));

        //checking if survivors are healthy
        if($survivor1->isAllowedToTrade() && $survivor2->isAllowedToTrade()){
            //ammount of each item that survivor1 wants to trade  
            $tradeAmmount1 = [
                'water' => $request->input('inputWater1'),
                'food' => $request->input('inputFood1'),
                'medication' => $request->input('inputMedication1'),
                'ammo' => $request->input('inputAmmo1')
            ];
    
            //ammount of each item that survivor2 wants to trade   
            $tradeAmmount2 = [
                'water' => $request->input('inputWater2'),
                'food' => $request->input('inputFood2'),
                'medication' => $request->input('inputMedication2'),
                'ammo' => $request->input('inputAmmo2')
            ];

            //calculating costs for both survivors
            $tradeCost1 = self::calcTradeCost($tradeAmmount1);
            $tradeCost2 = self::calcTradeCost($tradeAmmount2);

            //if trade cost is equivalent
            if($tradeCost1 == $tradeCost2){
                //retrieve inventories
                $inventory1 = Inventory::find($survivor1->inventory_id);
                $inventory2 = Inventory::find($survivor2->inventory_id);

                //checking if survivors have the items they wish to sell/trade
                if($inventory1->checkInventory($tradeAmmount1) && $inventory2->checkInventory($tradeAmmount2)){
                    //executing trade for both survivors
                    $inventory1->executeTrade($tradeAmmount1, $tradeAmmount2);
                    $inventory2->executeTrade($tradeAmmount2, $tradeAmmount1);

                    $inventory1->update();
                    $inventory2->update();
                }else{
                    return response()->json(ApiError::errorMessage('Invalid trade, not enough items', 403));    
                }
            }else{
                return response()->json(ApiError::errorMessage('Invalid trade, trade cost isnt the same', 403));
            }
        }else{
            return response()->json(ApiError::errorMessage('Infected survivor(s) cannot trade', 403));
        }
        return Redirect::route('tradeView')->with('toast_success', 'Trade sucessfull!');
    }

    /**
    * Report Survivor as infected
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function report(Request $request){
        $survivor = Survivor::find($request->id); //find the survivor you wish to report as infected
        $survivor->reportAsInfected();
        $survivor->update();
        return Redirect::route('home')->with('toast_success', 'Survivor sucessfully reported!');     
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

    /**
    * Calculate the price for each trade
    * @param  array $tradeAmmount
    * @return \Illuminate\Http\Response
    */
    public function calcTradeCost(array $tradeAmmount){
        /** I tried moving this function to model but it wouldn't work, 
        * it would return me 0 as a result every time or it wouldn't even accept my array as an array 
        * so I moved it back here so things could work again and I could stop losing all my sanity over this
        */
        $totalCost = 0;
        $cost = 4;
        
        //for each item ammount calculate it's cost
        foreach($tradeAmmount as $ammount){ 
            $totalCost += $ammount * $cost;
            $cost--;
        }
        return $totalCost; //return cost
    }

    public function calc(){
        $infectedPercentage = self::infectedPercentage();
        $lostPoints = self::lostPoints();
        $avgItems = self::averageItems();
        
        return view('reports', compact('infectedPercentage', 'lostPoints', 'avgItems'));
    }
}