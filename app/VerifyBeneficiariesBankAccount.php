<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyBeneficiariesBankAccount extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'verify_beneficiaries_bank_accounts';
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
        'contact_id',
        'beneficiary_id',
        'beneficiary_type',
        'bank_name',
        'account_name',
        'account_number',
        'account_ifsc',
        'upi_handle',
        'is_active',
        'is_primary',
        'status',
        'created_at'
    ];



    public function VerifiedMobileMonthlyTransaction() {
         return $this->hasMany('App\VerifiedMobileMonthlyTransaction', 'verify_mobile_number_id', 'id' );
    }


    public function MasterBank() {
         return $this->belongsTo('App\MasterBank', 'master_bank_id', 'id' );
    }
    
   
}
