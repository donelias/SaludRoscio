<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'drugs';

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
    protected $fillable = ['drug'];


    public function products()
    {
        return $this->hasMany(Product::class);
    }
 
}
