<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterBank extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_banks';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    //All Bank List for Frontend
    public function getAllBank(){
        $bankArr=array();
        $objArr = MasterBank::where('status','=',1)->get();
        foreach ($objArr as $obj) {
            $bankArr[$obj->id]=$obj->title;
        }
        return $bankArr;
    }


    public function VerifyBankAccount() {
         return $this->hasMany('App\VerifyBankAccount', 'master_bank_id', 'id' );
    }

}
