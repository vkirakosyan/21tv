<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

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
    protected $fillable = ['header_en','header_ru','header_am','first_text_en', 'first_text_ru', 'first_text_am','text_en', 'text_ru', 'text_am', 'mainpic', 'photo', 'video_url', 'header_ru', 'header_en', 'header_am','fasc_status' /*,'category_id'*/];

    // public function category()
    // {
    //     return $this->belongsTo('App\Category');
    // }
}
