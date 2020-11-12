<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top_Image extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'top__images';

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
    protected $fillable = ['first_img', 'second_img', 'third_img'];

    
}
