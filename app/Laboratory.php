<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'laboratories';

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
    protected $fillable = ['laboratory'];


    public function products()
    {
        return $this->hasMany(Product::class);
    }
 
}
