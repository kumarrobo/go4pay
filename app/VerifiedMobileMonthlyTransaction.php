<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifiedMobileMonthlyTransaction extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'verified_mobile_monthly_transactions';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','verify_mobile_number_id','month','year','used','transaction_status','created_at'
    ];



    public function VerifyMobileNumber() {
         return $this->belongsTo('App\VerifyMobileNumber', 'verify_mobile_number_id', 'id' );
    }

    public function User() {
         return $this->belongsTo('App\User', 'user_id', 'id' );
    }
    
   
}
