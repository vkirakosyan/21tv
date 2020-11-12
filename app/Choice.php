<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
       /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'choices';

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
    protected $fillable = ['questions_id','choice_en','choice_ru','choice_am', 'votes'];

    public function question()
    {
        return $this->belongsTo('App\Question','questions_id');
    }
}
