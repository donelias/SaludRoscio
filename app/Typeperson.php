<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeperson extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'typepersons';

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
    protected $fillable = ['typeperson'];


        public function peoples()
 {


        return $this->hasMany(People::class);
 } 

  
}
