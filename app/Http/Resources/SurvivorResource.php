<?php

namespace App\Http\Resources;
use App\Models\Inventory;
use Illuminate\Http\Resources\Json\JsonResource;

class SurvivorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    // public function toArray($request)
    // {
    //     return [
    //         'name' => $this->name,
    //         'age' => $this->age,
    //         'gender' => $this->gender,
    //         'lastLocation' => $this->lastLocation,
    //         'infected' => $this->infected,
    //         'infectedReports'=> $this->infectedReports,
    //         'inventory_id' => $this->inventory_id,            
    //         'created_at' => (string) $this->created_at,
    //         'updated_at' => (string) $this->updated_at,
    //         'qtyWater' => $this->inventory->qtyWater,
    //         'qtyFood' => $this->inventory->qtyFood,
    //         'qtyMedication' => $this->inventory->qtyMedication,
    //         'qtyAmmo' => $this->inventory->qtyAmmo,
    //     ];
    // }
}
