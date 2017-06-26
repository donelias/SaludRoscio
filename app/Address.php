<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'addresses';

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
    protected $fillable = ['street', 'N°_house', 'sector_id', 'people_id'];

      public function sector()
      {
          return $this->belongsTo('App\Sector');
      }
         public function peoples()
         {
             return $this->belongsTo(People::class);
         } 

}
