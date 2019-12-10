<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\API\ApiError;
use App\API\ApiSucess;

class Survivor extends Model
{
    protected $fillable = ['name', 'age', 'gender', 'lastLocation', 'infected', 'infectedReports', 'inventory_id'];
    protected $casts = [
        'lastLocation' => 'array'
    ];
    protected $guarded = ['id'];
    protected $table = 'survivors';

    /**
    * Defining relationship between Models
    */
    public function inventory(){
        return $this->hasOne(Inventory::class, 'id', 'id');
    }

    /**
    * Checking if Survivor is infected so he can trade
    */
    public function isAllowedToTrade(){
        if($this->infected){
            return 0;
        }else{
            return 1;
        }
    }

    public function updateLocation($newLocation){
        $this->lastLocation = $newLocation;
    }

    /**
    * Increments the infectedReports attribute to the specified Survivor
    *  and then checks if he's already considered infected or not
    */
    public function reportAsInfected(){
        $this->infectedReports += 1;
        if ($this->infectedReports >= 3){
            $this->infected = true;
        }
    }

    /**
    * Calculates the average item per survivor
    * @param  array $survivors
    * @return \Illuminate\Http\Response
    */
    public function scopecalcAvgItems(){
        $survivors = Survivor::where('infected', false)->get(); //get all healthy survivors
        $survivorsCount = $survivors->count();  //getting total of not infected survivors
       
        //initializing array of items
        $totalItems = array( 
            'totalWater' => 0.0, 
            'totalFood' => 0.0,
            'totalMedication' => 0.0,
            'totalAmmo' => 0.0
        );

        //getting every ammount of items from every survivor
        foreach($survivors as $s){
            $totalItems['totalWater'] += $s->inventory->qtyWater;
            $totalItems['totalFood'] += $s->inventory->qtyFood;
            $totalItems['totalMedication'] += $s->inventory->qtyMedication;
            $totalItems['totalAmmo'] += $s->inventory->qtyAmmo;
        }

        //calculate average item per survivor
        $average = array( 
            'avgWater' => number_format((($totalItems['totalWater'])/$survivorsCount), 2),
            'avgFood' => number_format((($totalItems['totalFood'])/$survivorsCount), 2),
            'avgMedication' => number_format((($totalItems['totalMedication'])/$survivorsCount), 2),
            'avgAmmo' => number_format((($totalItems['totalAmmo'])/$survivorsCount), 2)
        );

        return $average;
    }

    /**
    * Calculates ammount of lost points/items due to infected Survivors
    * @return \Illuminate\Http\Response
    */
    public function scopecalcLostPoints(){
        $survivors = Survivor::where('infected', true)->get(); //get all infected survivors
        $totalLostPoints = 0; //initializing lostPoints
        
        foreach($survivors as $s){
            $totalLostPoints += $s->inventory->totalPoints(); //calculating points on each survivor's inventory
        }

        return $totalLostPoints;
    }

    /**
    * Calculates ammount of lost points/items due to infected Survivors
    * @return \Illuminate\Http\Response
    */
    public function scopecalcInfectedPercentage(){
        $qtySurvivors = ($allSurvivors = Survivor::all())->count(); //get ammount of survivors total
        $qtyInfected = ($infected = Survivor::where('infected', true))->count(); //get ammount of infected survivors
        $qtyNotInfected = ($notInfected = Survivor::where('infected', false))->count(); //get ammount of not infected survivors
        

        $percentage = array( //calculating percentages
            'infectedPercentage' => number_format((($qtyInfected / $qtySurvivors)*100), 2),
            'notInfectedPercentage' => number_format((($qtyNotInfected / $qtySurvivors)*100), 2),
            'totalSurvivors' => $qtySurvivors,
            'infected' => $qtyInfected
        );

        return $percentage;
    }
}