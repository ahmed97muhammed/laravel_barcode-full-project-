<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        "product_name",
        "purchasing_price",
        "selling_price"
    ];
}
