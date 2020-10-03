<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
   //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    
    public function getAllCity(){
        $cityArr=array();
        $city = City::all();
        foreach ($city as $obj) {
            $cityArr[$obj->id]=$obj->city_name;
        }
        return $cityArr;
    }

    public function State() {
         return $this->belongsTo('App\State', 'state_id', 'id' );
    }
    
}
