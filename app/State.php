<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'states';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    
    public function getAllState(){
        $stateArr=array();
        $state = State::all();
        foreach ($state as $obj) {
            $stateArr[$obj->id]=$obj->state_name;
        }
        return $stateArr;
    }
}
