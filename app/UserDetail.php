<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class UserDetail extends Model
{

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'address_line_1', 
            'date_of_birth', 
            'company_type', 
            'company_name', 
            'address_line_2', 
            'district', 
            'pincode', 
            'service_by', 
            'zone', 
            'identification_type', 
            'is_name_on_pan_card', 
            'pan_card_number', 
            'id_proof_type_id', 
            'id_proof_document', 
            'address_proof_type_id', 
            'address_proof', 
            'business_proof_type_id', 
            'business_proof', 
            'user_id',
            'state_id',
            'city_id',
            'country_id'
    ];



    public function User() {
         return $this->belongsTo('App\User', 'user_id', 'id' )->getCountry('Country');
    }



    public function Country() {
         return $this->belongsTo('App\Country', 'country_id', 'id' );
    }


   



}
