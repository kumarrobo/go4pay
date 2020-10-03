<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class AmountType extends Model
{

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_amount', 
        'bank_transfer_amount',
        'type',
        'status',
        'created_at'
    ];



    public function MoneyTransferCharge() {
         return $this->hasMany('App\MoneyTransferCharge', 'amount_type', 'id' );
    }


}
