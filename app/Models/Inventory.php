<?php

namespace App\Models;

use App\API\ApiError;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['qtyWater', 'qtyFood', 'qtyMedication', 'qtyAmmo'];
    protected $guarded = ['id'];
    protected $table = 'inventories';

    /**
    * Define relationship between Models
    */
    public function survivor(){
        return $this->belongsTo('\App\Models\Survivor');
    }

    /**
     * Calculate Inventory points
     */
    public function totalPoints(){
        $total = (($this->qtyWater * 4) + ($this->qtyFood * 3) + ($this->qtyMedication * 2) + ($this->qtyAmmo));
        return $total;
    }

    /**
     * Check if the survivor has the ammount of items necessary to trade
     */
    public function checkInventory($trade){
        if($trade['water'] > $this->qtyWater){
            return response()->json(ApiError::errorMessage('Not enough water to trade', 406));
        }else if($trade['food'] > $this->qtyFood){
            return response()->json(ApiError::errorMessage('Not enough food to trade', 406));
        }else if($trade['medication'] > $this->qtyMedication){
            return response()->json(ApiError::errorMessage('Not enough medication to trade', 406));
        }else if($trade['ammo'] > $this->qtyAmmo){
            return response()->json(ApiError::errorMessage('Not enough ammo to trade', 406));
        }
        return true;
    }
}