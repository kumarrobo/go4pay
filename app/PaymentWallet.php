<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class PaymentWallet extends Model
{

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'total_balance',
        'credit_amount',
        'status',
        'created_at'
    ];



    public function User() {
         return $this->belongsTo('App\User', 'user_id', 'id' );
    }



    public function PaymentWalletTransaction() {
         return $this->hasMany('App\PaymentWalletTransaction', 'payment_wallet_id', 'id' );
    }


   



}
