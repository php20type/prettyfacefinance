<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->increments('id');
            $table->text('orderID')->nullable();

            //step 1
            $table->text('completed_by')->nullable();
            $table->tinyInteger('owner_director_company')->comment('0=no,1=yes')->nullable();
            $table->text('further_info')->nullable();
            $table->text('date_from_completed')->nullable();
            $table->text('company_name')->nullable();
            $table->text('company_registration_no')->nullable();
            $table->text('vat_no')->nullable();
            $table->text('other_trading_name')->nullable();
            $table->text('company_address')->nullable();
            $table->text('main_telephone')->nullable();
            $table->text('clinic_telephone_no')->nullable();
            $table->text('email_address')->nullable();
            $table->text('website_url')->nullable();
            $table->text('company_activities')->nullable();
            $table->tinyInteger('expected_volumes')->comment('0=0-50k,1=50k- 100k,2=Over 100k')->nullable();

            $table->tinyInteger('member_of_trade_body')->comment('0=no,1=yes')->nullable();
            $table->text('registration_no')->nullable();

            $table->tinyInteger('appointed_representative')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('previously_made_any_application')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('intend_to_make_application')->comment('0=no,1=yes')->nullable();

            $table->text('notified_principal_further_information')->nullable();
            $table->text('existing_principal_further_information')->nullable();
            $table->text('previously_made_application_further_information')->nullable();
            $table->text('intend_to_made_application_further_information')->nullable();

            $table->tinyInteger('notified_principal')->comment('0=no,1=yes,2=N/A')->nullable();
            $table->tinyInteger('existing_principal')->comment('0=no,1=yes,2=N/A')->nullable();
            $table->tinyInteger('previously_made_application')->comment('0=no,1=yes,2=N/A')->nullable();
            $table->tinyInteger('intend_to_made_application')->comment('0=no,1=yes')->nullable();

            $table->tinyInteger('discliplinary_action')->comment('0=no,1=yes')->nullable();
            $table->text('discliplinary_action_more_details')->nullable();

            $table->tinyInteger('directors_approved')->comment('0=no,1=yes')->nullable();
            $table->text('individual_reference_number')->nullable();

            $table->tinyInteger('cosmetic_procedures')->comment('0=no,1=yes')->nullable();
            $table->text('obtain_credit_report')->nullable();
            $table->tinyInteger('indemnity_insurance')->comment('0=no,1=yes')->nullable();

            //step 2
            $table->tinyInteger('carry_out_all')->comment('0=no,1=yes')->nullable();
            $table->text('carry_out_all_firther_info')->nullable();
            $table->text('frn_number')->nullable();
            $table->tinyInteger('work_with_third_party_company')->comment('0=no,1=yes')->nullable();
            $table->text('further_information')->nullable();

            //step 3
            $table->tinyInteger('registered_with_ico')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('receive_communications')->comment('0=no,1=yes,2=N/A')->nullable();
            $table->tinyInteger('opt_out_requests')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('protection_policy')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('privacy_policy')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('treating_customers_fairly')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('are_you_aware_of')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('transferred_outside_uk')->comment('0=no,1=yes')->nullable();
            $table->text('transferred_outside_uk_further_information')->nullable();
            $table->text('ico_reference_number')->nullable();
            $table->tinyInteger('right_to_delete')->comment('0=no,1=yes')->nullable();
            $table->text('right_to_delete_further_information')->nullable();

            //step 4
            $table->text('obtain_customers')->nullable();
            $table->text('manage_any_conflict')->nullable();
            $table->tinyInteger('keep_a_complaint_log')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('you_are_an_ar')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('do_you_confirm')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('you_confirm_that')->comment('0=no,1=yes')->nullable();

            //step 5
            $table->text('subject_matter_company_further_information')->nullable();
            $table->text('subject_matter_director_further_information')->nullable();
            $table->tinyInteger('subject_matter_company')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('subject_matter_director')->comment('0=no,1=yes')->nullable();
            $table->tinyInteger('allow_cfg')->comment('0=no,1=yes')->nullable();
            $table->text('allow_cfg_please_explain_why')->nullable();
            $table->text('monthly_basis_report')->nullable();
            $table->text('further_information_box_opposite')->nullable();

            //step 5
            $table->text('name')->nullable();
            $table->text('signature')->nullable();
            $table->text('position')->nullable();
            $table->text('date')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('address_proff')->nullable();
            $table->string('bank_account_proof')->nullable();
            $table->string('photo_of_working_space')->nullable();
            $table->string('logo')->nullable();

            $table->string('please_state')->nullable();
            $table->string('if_no_is_it')->nullable();

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
        Schema::dropIfExists('company_details');
    }
}
