<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'qtyWater' => $this->qtyWater,
            'qtyFood' => $this->qtyFood,
            'qtyMedication' => $this->qtyMedication,
            'qtyAmmo' => $this->qtyAmmo,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
