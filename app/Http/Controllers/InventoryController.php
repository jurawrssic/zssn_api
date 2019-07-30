<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\API\ApiError;
use App\Models\Inventory;
use App\Http\Resources\InventoryResource;

class InventoryController extends Controller
{
    private $inventory;
    /**
     * Display a listing of the Inventory resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InventoryResource::collection(Inventory::all());
    }

    /**
     * Store a newly created Inventory resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventory = Inventory::firstOrCreate(
            [
                'qtyWater' => qtyWater,
                'qtyFood' => qtyFood, 
                'qtyMedication' => qtyMedication,
                'qtyAmmo' => qtyAmmo, 
            ]
        );

        return new InventoryResource($inventory);
    }

    /**
     * Display the specified Inventory resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new InventoryResource($inventory);
    }

    /**
     * Update the specified Inventory resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $inventoryData = $request->all();
            $inventory = $this->inventory->find($id);
            $inventory->update($inventoryData);
        }catch(\Exception $e){
            if(config('app.debug'))
            {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 500);
            } 
            return response()->json(ApiError::errorMessage('An error ocurred', 1011), 500);
        }
    }

    /**
     * Remove the specified Inventory resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return response()->json(null, 204);
    }
}
