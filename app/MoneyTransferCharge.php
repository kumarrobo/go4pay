<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class MoneyTransferCharge extends Model
{

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'amount_type',
        'value',
        'status',
        'created_at'
    ];


  public function AmountType() {
         return $this->belongsTo('App\AmountType', 'amount_type', 'id' );
    }

}
