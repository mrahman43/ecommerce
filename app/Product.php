<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'name', 'description', 'image', 'category_id', 'subcategory_id', 'purchase_price', 'quantity',
    ];
}
