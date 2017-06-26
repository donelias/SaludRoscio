<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeorder extends Model
{
    public function order()
    {
        return $this->hasMany('App\Order');
    }
}
