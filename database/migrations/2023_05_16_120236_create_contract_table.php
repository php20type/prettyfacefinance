<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinic_id')->nullable();
            $table->text('iar')->nullable();
            $table->text('whereas')->nullable();
            $table->text('cfg')->nullable();
            $table->text('whereas_cfg')->nullable();
            $table->text('capacity')->nullable();
            $table->text('duties')->nullable();
            $table->text('pursuant_agreement')->nullable();
            $table->text('leads')->nullable();
            $table->text('cfg_location')->nullable();
            $table->text('in_which')->nullable();
            $table->text('licenses')->nullable();
            $table->text('registrations_required')->nullable();
            $table->text('supervision')->nullable();
            $table->text('management_of_cfg')->nullable();
            $table->text('locations_of')->nullable();
            $table->text('cfg_will_charge')->nullable();
            $table->text('application_fee')->nullable();
            $table->text('payable_to')->nullable();
            $table->text('payable_to_relating')->nullable();
            $table->text('services_for_which')->nullable();
            $table->text('finance_for')->nullable();
            $table->text('and_advice')->nullable();
            $table->text('to_engage')->nullable();
            $table->text('condition_thereto')->nullable();
            $table->text('direction_of_cfg')->nullable();
            $table->date('signature_date')->nullable();
            $table->string('iar_name')->nullable();
            $table->string('signature')->nullable();
            $table->date('date')->nullable();

            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract');
    }
}
