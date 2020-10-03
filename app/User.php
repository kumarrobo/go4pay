<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'first_name', 'last_name', 'email', 'password','mobile','role_id','password_text'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function UserDetail() {
         return $this->hasOne('App\UserDetail', 'user_id', 'id' );
    }

    public function PaymentWallet() {
         return $this->hasOne('App\PaymentWallet', 'user_id', 'id' );
    }


    public function MoneyTransferCharge() {
         return $this->hasMany('App\MoneyTransferCharge', 'user_id', 'id' );
    }
}
