<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacantJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacant_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('header_en')->nullable();
            $table->string('header_ru')->nullable();
            $table->string('header_am')->nullable();
            $table->text('small_text_en')->nullable();
            $table->text('small_text_ru')->nullable();
            $table->text('small_text_am')->nullable();
            $table->text('text_en')->nullable();
            $table->text('text_ru')->nullable();
            $table->text('text_am')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacant_jobs');
    }
}
