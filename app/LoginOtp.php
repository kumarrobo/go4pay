<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginOtp extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'login_otp';
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
        'user_id','mobile','OTP','time','created_at'
    ];
    
   
}
