<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollsSaveAnswer extends Model
{
    //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'polls_save_answers';

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
    protected $fillable = ['polls_id','useruuid','name'];

    public function polls_save()
    {
        return $this->belongsTo('App\PollsSave', 'polls_id');
    }
}
