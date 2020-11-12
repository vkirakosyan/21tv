<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photosession extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photosessions';

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
    protected $fillable = ['title_en', 'title_ru', 'title_am', 'photos', 'mainpic', 'date'];

    
}
