<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeidentificationcard extends Model
{
    
     protected $table = 'typeidentificationcards';

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
    protected $fillable = ['typeidentificationcard'];


        public function peoples()
 {


        return $this->hasMany(People::class);
 } 

}
