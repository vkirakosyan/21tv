<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollsSave extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'polls_saves';

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
    protected $fillable = ['type', 'options_en', 'options_ru', 'options_am', 'polls_save_cotegory_id'];

    public function polls_save_cotegory()
    {
        return $this->belongsTo('App\PollsSaveCotegory');
    }
    public function polls_save_answer()
    {
        return $this->hasMany('App\PollsSaveAnswer', 'polls_id');
    }
}
