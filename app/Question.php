<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

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
    protected $fillable = ['type', 'question_en', 'question_ru', 'question_am', 'active'];

    public function choices()
    {
        return $this->hasMany('App\Choice', 'questions_id')->select(['choice_'.App::getLocale().' as  choice','id']);;
    }
       public function choicesEdit()
    {
        return $this->hasMany('App\Choice', 'questions_id')->select(['choice_en','choice_am','choice_ru','id']);;
    }
}
