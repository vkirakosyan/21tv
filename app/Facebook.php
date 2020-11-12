<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'facebooks';

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
    protected $fillable = ['page_name','active'];

}
