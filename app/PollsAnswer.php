<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollsAnswer extends Model
{
        //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'polls_answers';

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
    protected $fillable = ['polls_id', 'condidate','useruuid','name', 'type'];
}
