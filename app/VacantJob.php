<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacantJob extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vacant_jobs';

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
    protected $fillable = ['header_en', 'header_ru', 'header_am', 'small_text_en','small_text_ru','small_text_am', 'text_en', 'text_ru', 'text_am'];
}
