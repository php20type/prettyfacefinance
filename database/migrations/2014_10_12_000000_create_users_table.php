<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf8_general_ci';
            $table->charset = 'utf8';
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telephone')->default('');
            $table->string('telephone_secondary')->default('');
            $table->string('date_of_birth')->default('');
            $table->string('address1')->default('')->nullable();
            $table->string('address2')->default('')->nullable();
            $table->string('city')->default('');
            $table->string('postcode')->default('');
            $table->integer('in_arrears')->default(0);
            $table->integer('role')->default('1');
            $table->integer('paylater_id')->default(0);
            $table->integer('clinic_id')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
