<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagePolls extends Model
{
    protected $table = 'image_polls';

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
    protected $fillable = ['type','image'];
}
