<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotosessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photosessions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title_en')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_am')->nullable();
            $table->string('mainpic')->nullable();
            $table->text('photos')->nullable();
            $table->date('date')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photosessions');
    }
}
