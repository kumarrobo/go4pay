<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class TransactionType extends Model
{

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_type', 
        'commission_type',
        'value',
        'status',
        'created_at'
    ];





    public function AgentCommission() {
         return $this->hasMany('App\AgentCommission', 'transaction_type_id', 'id' );
    }


   



}
