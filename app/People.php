<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'peoples';

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
    protected $fillable = ['name', 'identificationcard', 'phone','typeperson_id', 'typeidentificationcard_id', 'classificationperson_id'];




    public function order()
    {
        return $this->hasMany('App\Order', 'person_id');
    }

         public function typeperson()
 {


        return $this->belongsTo('App\Typeperson');
     }


         public function addresses()
         {
                return $this->hasOne('App\Address');
         } 

          public function typeidentificationcard()
 {


        return $this->belongsTo('App\Typeidentificationcard');
     }

            public function classificationperson()
 {


        return $this->belongsTo('App\Classificationperson');
     }


}
