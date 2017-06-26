<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['code', 'photo', 'name', 'grams', 'expiration_date', 'quantityproduct', 'quantityexisting', 'typemedicine_id', 'classification_id', 'drug_id', 'measurement_id', 'laboratory_id', 'statu_id'];


        public function typemedicine()
 {


        return $this->belongsTo('App\Typemedicine');
     }
       

           public function classification()
 {


        return $this->belongsTo('App\Classification');
     }

            public function drug()
 {


        return $this->belongsTo('App\Drug');
     }

      public function measurement()
 {


        return $this->belongsTo('App\Measurement');
     }


        public function laboratory()
 {


        return $this->belongsTo('App\Laboratory');
     }

         public function statu()
 {


        return $this->belongsTo('App\Statu');
     }


}
