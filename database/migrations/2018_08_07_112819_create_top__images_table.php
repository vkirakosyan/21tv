<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top__images', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('first_img')->nullable();
            $table->string('second_img')->nullable();
            $table->string('third_img')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('top__images');
    }
}
