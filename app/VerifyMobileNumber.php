<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyMobileNumber extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'verify_mobile_numbers';
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
        'user_id','mobile','otp_number','transfer_limit','is_verified','status','created_at'
    ];
    



    
    public function AgentCommission() {
         return $this->hasMany('App\AgentCommission', 'transaction_type_id', 'id' );
    }


    public function VerifyMobileBeneficiariesBankAccount() {
         return $this->hasMany('App\VerifyMobileBeneficiariesBankAccount', 'verify_mobile_number_id', 'id' );
    }

   
}
