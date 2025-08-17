<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'product_name',
        'product_category',
        'product_price',
        'product_unit',
        'product_qty',
        'product_freshness',
        'product_description',
        'harvest_date',
        'product_image',
        'deliver_availability',
        'pick_up_availability',

        'seller_id', 
         'is_available', 


    ];

}
