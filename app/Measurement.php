<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
     protected $table = 'measurements';

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
    protected $fillable = ['measurement'];


        public function products()
 {


        return $this->hasMany(Product::class);
 } 

}
