<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
      protected $fillable= [
        'store_name',
        'seller_id',
        'phone_number',
 
        'store_address',
        'postal_code',
        'city',
        'state',
        'email',
         
       
        'latitude',
        'longitude',
        'is_approved',
        'store_open',
       
        
     
        'profile_image',
           'is_seller'

      ];
}
