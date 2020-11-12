<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YesOrNoAnswer extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'yes_or_no_answers';

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
    protected $fillable = ['answer','question','useruuid','name'];
}
