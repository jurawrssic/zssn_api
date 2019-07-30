<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survivor extends Model
{
    protected $fillable = ['name', 'age', 'gender', 'lastLocation', 'infected', 'infectedReports', 'inventory_id'];
    protected $casts = [
        'lastLocation' => 'array'
    ];
    protected $guarded = ['id'];
    protected $table = 'survivors';

    /**
    * Define relationship between Models
    */
    public function inventory(){
        return $this->hasOne('App\Models\Inventory', 'id');
    }
}

