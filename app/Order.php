<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function ordersproducts()
    {
        return $this->hasMany('App\Ordersproducts');
    }

    public function people()
    {
        return $this->belongsTo('App\People', 'person_id');
    }

    public function typeorder()
    {
        return $this->belongsTo('App\Typeorder');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function statu()
    {
        
        return $this->belongsTo('App\Statu');
    }

}
