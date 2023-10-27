<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApprovalDateToCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_details', function (Blueprint $table) {
            $table->dateTime('approval_date')->after('is_approved')->nullable();
            $table->dateTime('reminder_mail_send_date')->after('approval_date')->nullable();
            $table->tinyInteger('is_reminder_mail_sent')->after('reminder_mail_send_date')->comment('0=pending,1=sent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_details', function (Blueprint $table) {
            $table->dropColumn('approval_date');
            $table->dropColumn('reminder_mail_send_date');
            $table->dropColumn('is_reminder_mail_sent');
        });
    }
}
