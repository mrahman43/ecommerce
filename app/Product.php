<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $fillable = [
    //   'name', 'description', 'image', 'category_id', 'subcategory_id', 'purchase_price', 'quantity',
    // ];
    public function category() {
        return $this->belongsTo('App\Category');
    }
    public function subcategory() {
        return $this->belongsTo('App\Subcategory');
    }
    public function status() {
        return $this->belongsTo('App\Status');
    }
    public function attributeset() {
        return $this->belongsTo('App\Attributeset');
    }
}
