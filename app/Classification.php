<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classifications';

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
    protected $fillable = ['classification'];

        public function products()
 {


        return $this->hasMany(Product::class);
 } 


 
}
