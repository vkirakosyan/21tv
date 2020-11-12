<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'about_uses';

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
    protected $fillable = ['mainpic','header1_en','header1_ru','header1_am','text1_en','text1_ru','text1_am','header2_en','header2_ru','header2_am','text2_en','text2_ru','text2_am'];

}