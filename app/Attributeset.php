<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeSet extends Model
{
  public function product() {
      return $this->hasMany('App\Product');
  }
  public function attribute() {
      return $this->belongsTo('App\Attribute');
  }
}
