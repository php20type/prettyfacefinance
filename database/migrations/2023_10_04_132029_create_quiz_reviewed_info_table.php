<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizReviewedInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_reviewed_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinic_id')->index()->nullable();
            $table->string('signature')->nullable();
            $table->tinyInteger('is_reviewed_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_reviewed_info');
    }
}
