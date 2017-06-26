<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classificationperson extends Model
{
     protected $table = 'classificationpersons';

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
    protected $fillable = ['classificationperson'];


        public function peoples()
 {
        return $this->hasMany(People::class);
 } 

}
