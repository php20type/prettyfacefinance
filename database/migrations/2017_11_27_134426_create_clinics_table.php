<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf8_general_ci';
            $table->charset = 'utf8';
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('telephone')->nullable();
            $table->string('address1');
            $table->string('address2')->default('')->nullable();
            $table->string('city');
            $table->string('postcode');
            $table->string('website');
            $table->string('company_number')->default('')->nullable();
            $table->string('profession')->default('');
            $table->string('pin')->default('')->nullable();
            $table->string('prescriber_name')->default('')->nullable();
            $table->string('prescriber_email')->default('')->nullable();
            $table->string('prescriber_pin')->default('')->nullable();
            $table->integer('paylater_id')->default(0)->nullable();
            $table->string('logo')->default('')->nullable();
            $table->longText('description')->nullable();
            $table->integer('approved')->default(0);
            $table->integer('paid')->default(0);

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
        Schema::dropIfExists('clinics');
    }
}
