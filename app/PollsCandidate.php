<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollsCandidate extends Model
{
    //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'polls_candidates';

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
    protected $fillable = ['type', 'options_en', 'options_ru', 'options_am'];
    
    public function answer()
    {
        return $this->hasMany('App\PollsAnswer', 'polls_id')->where('condidate', '=', 1);
    }
}
