<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parishes';

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
    protected $fillable = ['parish', 'municipality_id'];

      public function municipality()
 {


        return $this->belongsTo('App\Municipality');
 }
    
          public function sectors()
 {


        return $this->hasMany(Sector::class);
 }
}

