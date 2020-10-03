<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class AgentCommission extends Model
{

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'role_id',
        'transaction_type_id',
        'commission',
        'status',
        'created_at'
    ];




    public function User() {
         return $this->belongsTo('App\User', 'user_id', 'id' );
    }


    public function Role() {
         return $this->belongsTo('App\Role', 'role_id', 'id' );
    }


    public function TransactionType() {
         return $this->belongsTo('App\TransactionType', 'transaction_type_id', 'id' );
    }


    public function AgentCommission() {
         return $this->hasMany('App\AgentCommission', 'transaction_type_id', 'id' )->with('TransactionType');
    }


   



}
