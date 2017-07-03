<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordersproducts extends Model
{
      

     protected $table = 'ordersproducts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['quantity', 'product_id', 'order_id'];

    public function product()
     {
         return $this->belongsTo('App\Product');
     }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    

}
