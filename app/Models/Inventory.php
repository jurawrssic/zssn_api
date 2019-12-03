<?php

namespace App\Models;

use App\API\ApiError;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Inventory extends Model
{
    protected $fillable = ['qtyWater', 'qtyFood', 'qtyMedication', 'qtyAmmo'];
    protected $guarded = ['id'];
    protected $table = 'inventories';

    /**
    * Defining relationship between Models
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

    public function scopecalcAmmount($qtyWater, $qtyFood, $qtyMedication, $qtyAmmo){
        $tradeAmmount = array(
            'water' => $qtyWater,
            'food' => $qtyFood,
            'medication' => $qtyMedication,
            'ammo' => $qtyAmmo
        );
        return $tradeAmmount;
    }

    /**
     * Check if the survivor has the ammount of items necessary to 
     * @param  array $trade
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
        }else{
            return 1;
        }
    }

    /**
    * Calculate the price for each trade
    * @param  array $tradeAmmount
    * @return \Illuminate\Http\Response
    */
    public function scopecalcTradeCost($tradeAmmount){
        $totalCost = 0;
        $cost = 4;

        //for each item ammount calculate it's cost
        foreach($tradeAmmount as $ammount){ 
            $totalCost += $ammount * $cost;
            $cost--;
        }
        return $totalCost; //return total cost of the trade
    }

    /**
    * Checking if trade cost is equal on both sides
    * @param float $tradeAmmount1, $tradeAmmount2
    * @return \Illuminate\Http\Response
    */
    public function checkTradeCost($tradeAmmount1, $tradeAmmount2){
        $cost1 = self::calcTradeCost($tradeAmmount1);
        $cost2 = self::calcTradeCost($tradeAmmount2);

        if($cost1 != $cost2){
            return response()->json(ApiError::errorMessage('Invalid trade, not enough points', 403));
        }
    }

    /**
    * Executing trade in Survivor's Inventory
    * @param float $tradeAmmount1, $tradeAmmount2
    */
    public function executeTrade($tradeAmmount1, $tradeAmmount2){
        //add item being purchased and deduct item being sold, survivor1
        $this->qtyWater += ($tradeAmmount2['water'] - $tradeAmmount1['water']);
        $this->qtyFood += ($tradeAmmount2['food'] - $tradeAmmount1['food']); 
        $this->qtyMedication += ($tradeAmmount2['medication'] - $tradeAmmount1['medication']); 
        $this->qtyAmmo += ($tradeAmmount2['ammo'] - $tradeAmmount1['ammo']); 
    }
}