<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sectors';

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
    protected $fillable = ['sector', 'parish_id'];

      public function parish()
 {


        return $this->belongsTo('App\Parish');
 }

       public function addresses()
 {


        return $this->hasMany(Address::class);
 } 
    
}
