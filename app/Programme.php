<?php

namespace App;
use App;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'programmes';

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
    protected $fillable = ['name_en','name_ru','name_am', 'photo','is_picture'];

    public function episodes()
    {
        return $this->hasMany('App\Episode', 'programme_id', 'id')->select(['name_'.App::getLocale().' as  name',
                                                        'video_url',
                                                        'id',
                                                        'date',
                                                        'programme_id',
                                                        'status']);
    }

}
