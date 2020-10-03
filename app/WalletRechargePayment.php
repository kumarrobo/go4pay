<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class WalletRechargePayment extends Model
{

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'email',
        'payment_date',
        'net_amount_credit',
        'payment_source',
        'error_Message',
        'phone',
        'payment_ref_key',
        'cash_back_percentage',
        'status',
        'txnid',
        'productinfo',
        'card_type',
        'cardnum',
        'issuing_bank',
        'cardCategory',
        'amount',
        'deduction_percentage',
        'payment_mode',
        'created_at'
    ];



    public function User() {
         return $this->belongsTo('App\User', 'user_id', 'id' );
    }


    public function PaymentMode(){
        return $this->belongsTo('App\TransactionType', 'payment_mode', 'id' );
    }


    public function PaymentWalletTransaction() {
         return $this->hasMany('App\PaymentWalletTransaction', 'payment_wallet_id', 'id' );
    }


   



}
