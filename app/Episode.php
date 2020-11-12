<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'episodes';

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
    protected $fillable = ['programme_id', 'name_en', 'name_ru', 'name_am', 'video_url', 'date', 'photo', 'status'];

    public function programme()
    {
        return $this->belongsTo('App\Programme', 'programme_id', 'id')->select(['name_'.App::getLocale().' as  name','photo','id']);
    }
}
