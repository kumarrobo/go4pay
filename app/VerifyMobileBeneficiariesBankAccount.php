<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyMobileBeneficiariesBankAccount extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'verify_mobile_beneficiaries_bank_accounts';
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
            'verify_beneficiaries_bank_account_id',
            'user_id',
            'verify_mobile_number_id',
            'status',
            'recipient_number',
            'created_at'
    ];



    public function VerifyBeneficiariesBankAccount() {
         return $this->belongsTo('App\VerifyBeneficiariesBankAccount', 'verify_beneficiaries_bank_account_id', 'id' );
    }


    public function User() {
         return $this->belongsTo('App\User', 'user_id', 'id' );
    }


    public function VerifyMobileNumber() {
         return $this->belongsTo('App\VerifyMobileNumber', 'verify_mobile_number_id', 'id');
    }
   

    public function PaymentWalletTransaction() {
         return $this->belongsTo('App\PaymentWalletTransaction', 'verify_mobile_beneficiaries_bank_account_id', 'id');
    }
    
   
}
