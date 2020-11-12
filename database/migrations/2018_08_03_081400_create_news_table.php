<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('header_en')->nullable();
            $table->text('header_ru')->nullable();
            $table->text('header_am')->nullable();
            $table->text('first_text_en')->nullable();
            $table->text('first_text_ru')->nullable();
            $table->text('first_text_am')->nullable();
            $table->text('text_en')->nullable();
            $table->text('text_ru')->nullable();
            $table->text('text_am')->nullable();
            $table->string('mainpic')->nullable();
            $table->text('photo')->nullable();
            $table->string('video_url')->nullable();
            $table->boolean('fasc_status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news');
    }
}
