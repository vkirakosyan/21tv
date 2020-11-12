<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollsSaveCotegory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'polls_save_cotegories';

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
    protected $fillable = ['date'];

    public function polls_save()
    {
        return $this->hasMany('App\PollsSave', 'polls_save_cotegory_id');
    }

}
