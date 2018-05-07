<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function attributeset() {
        return $this->hasMany('App\Attributeset');
    }

}
