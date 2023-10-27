<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPathToClinicSignUpWaitListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinic_sign_up_wait_list', function (Blueprint $table) {
            $table->string('path')->after('instagram_handle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clinic_sign_up_wait_list', function (Blueprint $table) {
            $table->dropColumn('path');
        });
    }
}
