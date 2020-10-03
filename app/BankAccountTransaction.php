<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccountTransaction extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bank_account_transactions';
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
        'user_id',
        'status',
        'verify_mobile_number_id',
        'verify_mobile_beneficiaries_bank_account_id',
        'unique_request_number',
        'transfer_request_id',
        'failure_reason',
        'beneficiary_id',
        'transaction_date',
        'unique_transaction_reference',
        'payment_mode',
        'amount',
        'currency',
        'narration',
        'beneficiary_bank_name',
        'beneficiary_account_name',
        'beneficiary_account_number',
        'beneficiary_account_ifsc',
        'beneficiary_upi_handle',
        'service_charge',
        'gst_amount',
        'service_charge_with_gst',
        'queue_on_low_balance',
        'udf1',
        'udf2',
        'udf3',
        'udf4',
        'udf5',
        'created_at'
    ];



    public function VerifiedMobileMonthlyTransaction() {
         return $this->hasMany('App\VerifiedMobileMonthlyTransaction', 'verify_mobile_number_id', 'id' );
    }


    public function MasterBank() {
         return $this->belongsTo('App\MasterBank', 'master_bank_id', 'id' );
    }
    
   
}
