<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_uses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('mainpic')->nullable();
            $table->string('header1_en')->nullable();
            $table->string('header1_ru')->nullable();
            $table->string('header1_am')->nullable();
            $table->text('text1_en')->nullable();
            $table->text('text1_ru')->nullable();
            $table->text('text1_am')->nullable();
            $table->string('header2_en')->nullable();
            $table->string('header2_ru')->nullable();
            $table->string('header2_am')->nullable();
            $table->text('text2_en')->nullable();
            $table->text('text2_ru')->nullable();
            $table->text('text2_am')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_uses');
    }
}
