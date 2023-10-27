@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1 class="border-bottom pb-3">Company Details</h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        See below for detailed information
                    </div>
                </div>
            </div>
        @endif
        <div class="col-12">
            @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error'); ?>
            @endif
        </div>
        <div class="row">
            <div class="col-12 request-form" style="padding-bottom: 15px;">
                {!! Form::open([
                    'route' => ['store.companyDetails', $link],
                    'method' => 'post',
                    'class' => 'needs-validation myForm',
                    'novalidate' => '',
                    'files' => true,
                ]) !!}

                <div class="col-12">
                    <h4 class="text-center mb-5">
                        Please complete the following questionnaire and provide accompanying documents required. If you
                        would prefer to do this over the telephone with one of our agents then please call us on 01613886107
                        or email admin@cosmeticfinancegroup.co.uk so that we can arrange a call to assist you.
                    </h4>
                </div>

                <div class="Company-details-sec">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="multi-step">
                                <div class="multi-step-first">
                                    <h3>Company Details</h3>
                                    <div class="number active" id="step-1"><span class="hide-number">1</span></div>
                                </div>
                                <div class="multi-step-first">
                                    <h3>Use of Third Parties</h3>
                                    <div class="number" id="step-2">2</div>
                                </div>
                                <div class="multi-step-first">
                                    <h3>Data Protection and Security</h3>
                                    <div class="number" id="step-3">3</div>
                                </div>
                                <div class="multi-step-first">
                                    <h3>Compliance</h3>
                                    <div class="number" id="step-4">4</div>
                                </div>
                                <div class="multi-step-first">
                                    <h3>Fitness and Propriety</h3>
                                    <div class="number" id="step-5">5</div>
                                </div>
                                <div class="multi-step-first">
                                    <h3>Confirm</h3>
                                    <div class="number" id="step-6">6</div>
                                </div>
                                <div class="multi-step-first">
                                    <h3>Please Read Carefully</h3>
                                    <div class="number" id="step-7">7</div>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-8 question-area-section-box">
                            <div class="question-area-first" id="question_areafirst">
                                <div class="step_number">
                                    <p>Step 1/7</p>
                                    <h2>Company Details</h2>
                                </div>


                                <div class="from-group">
                                    <label>Completed by</label>
                                    <input type="text" value="{{ $companyDetailsmodel->completed_by ?? '' }}"
                                        name="completed_by" class="form-control">
                                </div>

                                <div class="from-group">
                                    <label>Are you the owner/director of the company</label>

                                    <div class="w-100 d-flex">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->owner_director_company) && $companyDetailsmodel->owner_director_company == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="owner_director_company"
                                                id="owner_director_company" value="1">
                                            <label class="form-check-label" for="owner_director_company">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->owner_director_company) && $companyDetailsmodel->owner_director_company == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="owner_director_company"
                                                id="owner_director_company" value="0">
                                            <label class="form-check-label" for="owner_director_company">No</label>
                                        </div>
                                    </div>

                                    <div class="further-information mt-3" style="display: none;">
                                        <label>Further Information</label>
                                        <input type="text" value="{{ $companyDetailsmodel->further_info ?? '' }}"
                                            class="form-control" name="further_info">
                                    </div>

                                </div>

                                <div class="from-group">
                                    <label>Date form completed </label>
                                    <input type="text" value="{{ $companyDetailsmodel->date_from_completed ?? '' }}"
                                        class="form-control" name="date_from_completed">
                                </div>

                                <div class="from-group">
                                    <label>Sole trader or Ltd company?</label>
                                    <div class="w-100 d-flex">
                                        @if (!isset($companyDetailsmodel->sole_trader_or_ltd_company))
                                            <div class="form-check mr-3">
                                                <input checked class="form-check-input" type="radio"
                                                    name="sole_trader_or_ltd_company" id="sole_trader_or_ltd_company"
                                                    value="Sole trader">
                                                <label class="form-check-label" for="sole_trader_or_ltd_company">Sole
                                                    trader</label>
                                            </div>
                                            <div class="form-check mr-3">
                                                <input class="form-check-input" type="radio"
                                                    name="sole_trader_or_ltd_company" id="sole_trader_or_ltd_company"
                                                    value="Ltd company">
                                                <label class="form-check-label" for="sole_trader_or_ltd_company">Ltd
                                                    company</label>
                                            </div>
                                        @else
                                            <div class="form-check mr-3">
                                                <input
                                                    {{ (isset($companyDetailsmodel->sole_trader_or_ltd_company) && $companyDetailsmodel->sole_trader_or_ltd_company == 'Sole trader' ? 'checked' : '') ?? '' }}
                                                    class="form-check-input" type="radio"
                                                    name="sole_trader_or_ltd_company" id="sole_trader_or_ltd_company"
                                                    value="Sole trader">
                                                <label class="form-check-label" for="sole_trader_or_ltd_company">Sole
                                                    trader</label>
                                            </div>
                                            <div class="form-check mr-3">
                                                <input
                                                    {{ (isset($companyDetailsmodel->sole_trader_or_ltd_company) && $companyDetailsmodel->sole_trader_or_ltd_company == 'Ltd company' ? 'checked' : '') ?? '' }}
                                                    class="form-check-input" type="radio"
                                                    name="sole_trader_or_ltd_company" id="sole_trader_or_ltd_company"
                                                    value="Ltd company">
                                                <label class="form-check-label" for="sole_trader_or_ltd_company">Ltd
                                                    company</label>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Company Name/Trading name </label>
                                    <input type="text" value="{{ $companyDetailsmodel->company_name ?? '' }}"
                                        class="form-control" name="company_name">
                                </div>

                                <div class="from-group">
                                    <label>Company Registration Number On Companies House</label>
                                    <input type="text"
                                        value="{{ $companyDetailsmodel->company_registration_no ?? '' }}"
                                        class="form-control" name="company_registration_no">
                                </div>

                                <div class="from-group">
                                    <label>VAT Number (if applicable)</label>
                                    <input type="text" value="{{ $companyDetailsmodel->vat_no ?? '' }}"
                                        class="form-control" name="vat_no">
                                </div>

                                <div class="from-group">
                                    <label>Other trading names (please ensure that all trading names entered here are
                                        entered on the ICO Fee Payers Register)</label>
                                    <input type="text" value="{{ $companyDetailsmodel->other_trading_name ?? '' }}"
                                        class="form-control" name="other_trading_name">
                                </div>

                                <div class="from-group">
                                    <label>Company Address (please provide trading address also if this is different to
                                        the registered address of the company)</label>
                                    <input type="text" value="{{ $companyDetailsmodel->company_address ?? '' }}"
                                        class="form-control" name="company_address">
                                </div>

                                <div class="from-group">
                                    <label>Main Telephone</label>
                                    <input type="text" value="{{ $companyDetailsmodel->main_telephone ?? '' }}"
                                        class="form-control" name="main_telephone">
                                </div>

                                <div class="from-group">
                                    <label>Clinic Telephone Number (If applicable)</label>
                                    <input type="number" value="{{ $companyDetailsmodel->clinic_telephone_no ?? '' }}"
                                        class="form-control" name="clinic_telephone_no">
                                </div>

                                <div class="from-group">
                                    <label>Email Address</label>
                                    <input type="email" value="{{ $companyDetailsmodel->email_address ?? '' }}"
                                        class="form-control" name="email_address">
                                </div>

                                <div class="from-group">
                                    <label>Please provide your website(s) URL(s), Facebook page URL and details of
                                        names/handles on any other social media platform you use (Twitter, Instagram
                                        etc.)</label>
                                    <input type="text" value="{{ $companyDetailsmodel->website_url ?? '' }}"
                                        class="form-control" name="website_url">
                                </div>

                                <div class="from-group">
                                    <label>Please describe the activities that the company carries out.</label>
                                    <input type="text" value="{{ $companyDetailsmodel->company_activities ?? '' }}"
                                        class="form-control" name="company_activities">
                                </div>

                                <div class="from-group">
                                    <label>Expected volumes from finance clients over the next 12 months.</label>
                                    <div class="w-100 d-flex">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->expected_volumes) && $companyDetailsmodel->expected_volumes == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="expected_volumes"
                                                id="expected_volumes" value="0">
                                            <label class="form-check-label" for="expected_volumes">0-50k</label>
                                        </div>
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->expected_volumes) && $companyDetailsmodel->expected_volumes == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="expected_volumes"
                                                id="expected_volumes" value="1">
                                            <label class="form-check-label" for="expected_volumes">50k- 100k</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->expected_volumes) && $companyDetailsmodel->expected_volumes == '2' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="expected_volumes"
                                                id="expected_volumes" value="2">
                                            <label class="form-check-label" for="expected_volumes">Over 100k</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Are you a member of a trade body or hold a professional pin registration
                                        ?</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->member_of_trade_body) && $companyDetailsmodel->member_of_trade_body == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="member_of_trade_body"
                                                id="member_of_trade_body" value="1">
                                            <label class="form-check-label" for="member_of_trade_body">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->member_of_trade_body) && $companyDetailsmodel->member_of_trade_body == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="member_of_trade_body"
                                                id="member_of_trade_body" value="0">
                                            <label class="form-check-label" for="member_of_trade_body">No</label>
                                        </div>
                                    </div>
                                    <div class="registration-number" style="display: none;">
                                        <label>Registration Number</label>
                                        <input type="text" value="{{ $companyDetailsmodel->registration_no ?? '' }}"
                                            class="form-control" name="registration_no">
                                    </div>
                                </div>

                                <div class="from-group registration-number-no" style="display: none;">
                                    <label>If no is it</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->if_no_is_it) && $companyDetailsmodel->if_no_is_it == 'None' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="if_no_is_it"
                                                id="if_no_is_it" value="None">
                                            <label class="form-check-label" for="if_no_is_it">None</label>
                                        </div>

                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->if_no_is_it) && $companyDetailsmodel->if_no_is_it == 'NMC' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="if_no_is_it"
                                                id="if_no_is_it" value="NMC">
                                            <label class="form-check-label" for="if_no_is_it">NMC</label>
                                        </div>

                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->if_no_is_it) && $companyDetailsmodel->if_no_is_it == 'GMC' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="if_no_is_it"
                                                id="if_no_is_it" value="GMC">
                                            <label class="form-check-label" for="if_no_is_it">GMC</label>
                                        </div>

                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->if_no_is_it) && $companyDetailsmodel->if_no_is_it == 'GDC' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="if_no_is_it"
                                                id="if_no_is_it" value="GDC">
                                            <label class="form-check-label" for="if_no_is_it">GDC</label>
                                        </div>

                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->if_no_is_it) && $companyDetailsmodel->if_no_is_it == 'Other' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="if_no_is_it"
                                                id="if_no_is_it" value="Other">
                                            <label class="form-check-label" for="if_no_is_it">Other</label>
                                        </div>
                                    </div>

                                    <div class="please-state" style="display: none;">
                                        <label>Please State</label>
                                        <input type="text" value="{{ $companyDetailsmodel->please_state ?? '' }}"
                                            class="form-control" name="please_state">
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Are you an Appointed Representative for any other FCA authorised company? If
                                        so, please provide the name and the activities that you carry out for it and
                                        your company Firm Reference Number (FRN).</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->appointed_representative) && $companyDetailsmodel->appointed_representative == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="appointed_representative"
                                                id="appointed_representative" value="1">
                                            <label class="form-check-label" for="appointed_representative">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->appointed_representative) && $companyDetailsmodel->appointed_representative == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="appointed_representative"
                                                id="appointed_representative" value="0">
                                            <label class="form-check-label" for="appointed_representative">No</label>
                                        </div>
                                    </div>

                                    <div class="next-questions" style="display: none;">

                                        <div class="form-group">
                                            <label>FRN number</label>
                                            <input type="text" value="{{ $companyDetailsmodel->frn_number ?? '' }}"
                                                class="form-control" name="frn_number">
                                        </div>

                                        <div class="form-group">
                                            <label>Has any application previously made</label>
                                            <div class="w-100 d-flex mb-3">
                                                <div class="form-check mr-3">
                                                    <input
                                                        {{ (isset($companyDetailsmodel->previously_made_any_application) && $companyDetailsmodel->previously_made_any_application == '1' ? 'checked' : '') ?? '' }}
                                                        class="form-check-input" type="radio"
                                                        name="previously_made_any_application"
                                                        id="previously_made_any_application" value="1">
                                                    <label class="form-check-label"
                                                        for="previously_made_any_application">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        {{ (isset($companyDetailsmodel->previously_made_any_application) && $companyDetailsmodel->previously_made_any_application == '0' ? 'checked' : '') ?? '' }}
                                                        class="form-check-input" type="radio"
                                                        name="previously_made_any_application"
                                                        id="previously_made_any_application" value="0">
                                                    <label class="form-check-label"
                                                        for="previously_made_any_application">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Do you intend to make an application</label>
                                            <div class="w-100 d-flex mb-3">
                                                <div class="form-check mr-3">
                                                    <input
                                                        {{ (isset($companyDetailsmodel->intend_to_make_application) && $companyDetailsmodel->intend_to_make_application == '1' ? 'checked' : '') ?? '' }}
                                                        class="form-check-input" type="radio"
                                                        name="intend_to_make_application" id="intend_to_make_application"
                                                        value="1">
                                                    <label class="form-check-label"
                                                        for="intend_to_make_application">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        {{ (isset($companyDetailsmodel->intend_to_make_application) && $companyDetailsmodel->intend_to_make_application == '0' ? 'checked' : '') ?? '' }}
                                                        class="form-check-input" type="radio"
                                                        name="intend_to_make_application" id="intend_to_make_application"
                                                        value="0">
                                                    <label class="form-check-label"
                                                        for="intend_to_make_application">No</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>If you have an existing Principal, have you notified the Principal of your
                                        intention to make an application to become and IAR?</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->notified_principal) && $companyDetailsmodel->notified_principal == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="notified_principal"
                                                id="notified_principal" value="1">
                                            <label class="form-check-label" for="notified_principal">Yes</label>
                                        </div>
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->notified_principal) && $companyDetailsmodel->notified_principal == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="notified_principal"
                                                id="notified_principal" value="0">
                                            <label class="form-check-label" for="notified_principal">No</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->notified_principal) && $companyDetailsmodel->notified_principal == '2' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="notified_principal"
                                                id="notified_principal" value="2">
                                            <label class="form-check-label" for="notified_principal">N/A</label>
                                        </div>
                                    </div>
                                    <div class="notified_principal_further_information" style="display: none;">
                                        <label>Further Information</label>
                                        <input
                                            value="{{ $companyDetailsmodel->notified_principal_further_information ?? '' }}"
                                            type="text" class="form-control"
                                            name="notified_principal_further_information">
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>If you have an existing Principal, will you continue to be an AR of that
                                        Principal while being and IAR?</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->existing_principal) && $companyDetailsmodel->existing_principal == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="existing_principal"
                                                id="existing_principal" value="1">
                                            <label class="form-check-label" for="existing_principal">Yes</label>
                                        </div>
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->existing_principal) && $companyDetailsmodel->existing_principal == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="existing_principal"
                                                id="existing_principal" value="0">
                                            <label class="form-check-label" for="existing_principal">No</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->existing_principal) && $companyDetailsmodel->existing_principal == '2' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="existing_principal"
                                                id="existing_principal" value="2">
                                            <label class="form-check-label" for="existing_principal">N/A</label>
                                        </div>
                                    </div>
                                    <div class="existing_principal_further_information" style="display: none;">
                                        <label>Further Information</label>
                                        <input
                                            value="{{ $companyDetailsmodel->existing_principal_further_information ?? '' }}"
                                            type="text" class="form-control"
                                            name="existing_principal_further_information">
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Has any application that you have previously made, either for direct
                                        authorisation or as an appointed representative been refused by the FCA, if so
                                        why?</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->previously_made_application) && $companyDetailsmodel->previously_made_application == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio"
                                                name="previously_made_application" id="previously_made_application"
                                                value="1">
                                            <label class="form-check-label" for="previously_made_application">Yes</label>
                                        </div>
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->previously_made_application) && $companyDetailsmodel->previously_made_application == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio"
                                                name="previously_made_application" id="previously_made_application"
                                                value="0">
                                            <label class="form-check-label" for="previously_made_application">No</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->previously_made_application) && $companyDetailsmodel->previously_made_application == '2' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio"
                                                name="previously_made_application" id="previously_made_application"
                                                value="2">
                                            <label class="form-check-label" for="previously_made_application">N/A</label>
                                        </div>
                                    </div>
                                    <div class="previously_made_application_further_information" style="display: none;">
                                        <label>Further Information</label>
                                        <input
                                            value="{{ $companyDetailsmodel->previously_made_application_further_information ?? '' }}"
                                            type="text" class="form-control"
                                            name="previously_made_application_further_information">
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Do you intend to make an application to the FCA for direct authorisation for
                                        the activity for which you want to be an IAR within the next
                                        18months?</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->intend_to_made_application) && $companyDetailsmodel->intend_to_made_application == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="intend_to_made_application"
                                                id="intend_to_made_application" value="1">
                                            <label class="form-check-label" for="intend_to_made_application">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->intend_to_made_application) && $companyDetailsmodel->intend_to_made_application == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="intend_to_made_application"
                                                id="intend_to_made_application" value="0">
                                            <label class="form-check-label" for="intend_to_made_application">No</label>
                                        </div>
                                    </div>
                                    <div class="intend_to_made_application_further_information" style="display: none;">
                                        <label>Further Information</label>
                                        <input type="text"
                                            value="{{ $companyDetailsmodel->intend_to_made_application_further_information ?? '' }}"
                                            class="form-control" name="intend_to_made_application_further_information">
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Have there been any discliplinary action by the FCA, ICO or any regulatory
                                        body in the last 5 years ? If yes please give details</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->discliplinary_action) && $companyDetailsmodel->discliplinary_action == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="discliplinary_action"
                                                id="discliplinary_action" value="1">
                                            <label class="form-check-label" for="discliplinary_action">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->discliplinary_action) && $companyDetailsmodel->discliplinary_action == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="discliplinary_action"
                                                id="discliplinary_action" value="0">
                                            <label class="form-check-label" for="discliplinary_action">No</label>
                                        </div>
                                    </div>
                                    <div class="more-details" style="display: none;">
                                        <label>More Details </label>
                                        <input value="{{ $companyDetailsmodel->discliplinary_action_more_details ?? '' }}"
                                            type="text" class="form-control" name="discliplinary_action_more_details">
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Have any directors been approved by the FCA previously.</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->directors_approved) && $companyDetailsmodel->directors_approved == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="directors_approved"
                                                id="directors_approved" value="1">
                                            <label class="form-check-label" for="directors_approved">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->directors_approved) && $companyDetailsmodel->directors_approved == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="directors_approved"
                                                id="directors_approved" value="0">
                                            <label class="form-check-label" for="directors_approved">No</label>
                                        </div>
                                    </div>
                                    <div class="IRN-number" style="display: none;">
                                        <label>Individual Reference Number (IRN).</label>
                                        <input type="text"
                                            value="{{ $companyDetailsmodel->individual_reference_number ?? '' }}"
                                            class="form-control" name="individual_reference_number">
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Please confirm that you do/will have in place processes to verify the
                                        integrity and competency of all those that you employ/engage the services of in
                                        the provision of cosmetic procedures?</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->cosmetic_procedures) && $companyDetailsmodel->cosmetic_procedures == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="cosmetic_procedures"
                                                id="cosmetic_procedures" value="1">
                                            <label class="form-check-label" for="cosmetic_procedures">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->cosmetic_procedures) && $companyDetailsmodel->cosmetic_procedures == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="cosmetic_procedures"
                                                id="cosmetic_procedures" value="0">
                                            <label class="form-check-label" for="cosmetic_procedures">No</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="from-group">
                                    <label>We will obtain a credit report for all company directors, dated within the
                                        last 30 days</label>
                                    <input type="text" class="form-control" name="obtain_credit_report">
                                </div> --}}

                                <div class="from-group">
                                    <label>Do you have indemnity insurance ? (CFG requires that your company has
                                        indemnity insurance before trading as an IAR).</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->indemnity_insurance) && $companyDetailsmodel->indemnity_insurance == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="indemnity_insurance"
                                                id="indemnity_insurance" value="1">
                                            <label class="form-check-label" for="indemnity_insurance">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->indemnity_insurance) && $companyDetailsmodel->indemnity_insurance == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="indemnity_insurance"
                                                id="indemnity_insurance" value="0">
                                            <label class="form-check-label" for="indemnity_insurance">No</label>
                                        </div>
                                    </div>
                                    <em>CFG will obtain a credit report for all company directors, dated within the last
                                        30 days. This will be a soft search and will not leave a footprint on your
                                        credit score. </em>
                                </div>

                                <div class="from-group btn-step float-right">
                                    <a id="next" href="javascript:void(0);">Next</a>
                                </div>



                            </div>

                            <div class="question-area-second" id="question_areaTwo">
                                <div class="step_number">
                                    <p>Step 2/7</p>
                                    <h2>Use of Third Parties</h2>
                                </div>


                                <div class="from-group">
                                    <label>Do you intend to use any other third parties to carry out all or part of the
                                        services? If so, please give details</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->carry_out_all) && $companyDetailsmodel->carry_out_all == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="carry_out_all"
                                                id="carry_out_all" value="1">
                                            <label class="form-check-label" for="carry_out_all">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->carry_out_all) && $companyDetailsmodel->carry_out_all == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="carry_out_all"
                                                id="carry_out_all" value="0">
                                            <label class="form-check-label" for="carry_out_all">No</label>
                                        </div>
                                    </div>
                                    <div class="carry_out_all_firther_info" style="display: none;">
                                        <label>Further Information</label>
                                        <input type="text"
                                            value="{{ $companyDetailsmodel->carry_out_all_firther_info ?? '' }}"
                                            class="form-control" name="carry_out_all_firther_info">
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Does your company work alongside any third party companies ? (If yes we will
                                        require some further information)</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->work_with_third_party_company) && $companyDetailsmodel->work_with_third_party_company == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio"
                                                name="work_with_third_party_company" id="work_with_third_party_company"
                                                value="1">
                                            <label class="form-check-label"
                                                for="work_with_third_party_company">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->work_with_third_party_company) && $companyDetailsmodel->work_with_third_party_company == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio"
                                                name="work_with_third_party_company" id="work_with_third_party_company"
                                                value="0">
                                            <label class="form-check-label" for="work_with_third_party_company">No</label>
                                        </div>
                                    </div>
                                    <div class="some-further-information" style="display: none;">
                                        <label>Further Information</label>
                                        <input type="text"
                                            value="{{ $companyDetailsmodel->further_information ?? '' }}"
                                            class="form-control" name="further_information">
                                    </div>
                                </div>

                                <div class="from-group btn-step float-right">
                                    <a id="back" href="javascript:void(0);">Back</a>
                                    <a id="step2-next" href="javascript:void(0);">Next</a>
                                </div>

                            </div>

                            <div class="question-area-third" id="question_areaThird">
                                <div class="step_number">
                                    <p>Step 3/7</p>
                                    <h2>Data Protection and Security</h2>
                                </div>


                                <div class="from-group">
                                    <label>Are you registered with the ICO for data protection purposes</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->registered_with_ico) && $companyDetailsmodel->registered_with_ico == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="registered_with_ico"
                                                id="registered_with_ico" value="1">
                                            <label class="form-check-label" for="registered_with_ico">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->registered_with_ico) && $companyDetailsmodel->registered_with_ico == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="registered_with_ico"
                                                id="registered_with_ico" value="0">
                                            <label class="form-check-label" for="registered_with_ico">No</label>
                                        </div>
                                    </div>

                                    <div class="ico_reference_number" style="display: none;">
                                        <label>ICO reference number</label>
                                        <input value="{{ $companyDetailsmodel->ico_reference_number ?? '' }}"
                                            type="text" class="form-control" name="ico_reference_number">
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>If your customers receive communications or marketing about your business,
                                        have you acquired valid consent? </label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->receive_communications) && $companyDetailsmodel->receive_communications == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="receive_communications"
                                                id="receive_communications" value="1">
                                            <label class="form-check-label" for="receive_communications">Yes</label>
                                        </div>
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->receive_communications) && $companyDetailsmodel->receive_communications == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="receive_communications"
                                                id="receive_communications" value="0">
                                            <label class="form-check-label" for="receive_communications">No</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->receive_communications) && $companyDetailsmodel->receive_communications == '2' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="receive_communications"
                                                id="receive_communications" value="2">
                                            <label class="form-check-label" for="receive_communications">N/A</label>
                                        </div>
                                    </div>

                                    <div class="opt-requests" style="display: none;">
                                        <label>do your customers have an opt-out option?</label>
                                        <div class="w-100 d-flex mb-3">
                                            <div class="form-check mr-3">
                                                <input
                                                    {{ (isset($companyDetailsmodel->opt_out_requests) && $companyDetailsmodel->opt_out_requests == '1' ? 'checked' : '') ?? '' }}
                                                    class="form-check-input" type="radio" name="opt_out_requests"
                                                    id="opt_out_requests" value="1">
                                                <label class="form-check-label" for="opt_out_requests">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    {{ (isset($companyDetailsmodel->opt_out_requests) && $companyDetailsmodel->opt_out_requests == '0' ? 'checked' : '') ?? '' }}
                                                    class="form-check-input" type="radio" name="opt_out_requests"
                                                    id="opt_out_requests" value="0">
                                                <label class="form-check-label" for="opt_out_requests">No</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="from-group">
                                    <label>Do you have copies of the following policies:</label>

                                    <div class="from-group">
                                        <label>Data Protection Policy</label>
                                        <div class="w-100 d-flex mb-3">
                                            <div class="form-check mr-3">
                                                <input
                                                    {{ (isset($companyDetailsmodel->protection_policy) && $companyDetailsmodel->protection_policy == '1' ? 'checked' : '') ?? '' }}
                                                    class="form-check-input" type="radio" name="protection_policy"
                                                    id="protection_policy" value="1">
                                                <label class="form-check-label" for="protection_policy">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    {{ (isset($companyDetailsmodel->protection_policy) && $companyDetailsmodel->protection_policy == '0' ? 'checked' : '') ?? '' }}
                                                    class="form-check-input" type="radio" name="protection_policy"
                                                    id="protection_policy" value="0">
                                                <label class="form-check-label" for="protection_policy">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="from-group">
                                        <label>Privacy Policy/Notice</label>
                                        <div class="w-100 d-flex mb-3">
                                            <div class="form-check mr-3">
                                                <input
                                                    {{ (isset($companyDetailsmodel->privacy_policy) && $companyDetailsmodel->privacy_policy == '1' ? 'checked' : '') ?? '' }}
                                                    class="form-check-input" type="radio" name="privacy_policy"
                                                    id="privacy_policy" value="1">
                                                <label class="form-check-label" for="privacy_policy">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    {{ (isset($companyDetailsmodel->privacy_policy) && $companyDetailsmodel->privacy_policy == '0' ? 'checked' : '') ?? '' }}
                                                    class="form-check-input" type="radio" name="privacy_policy"
                                                    id="privacy_policy" value="0">
                                                <label class="form-check-label" for="privacy_policy">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="from-group">
                                        <label>Treating Customers Fairly</label>
                                        <div class="w-100 d-flex mb-3">
                                            <div class="form-check mr-3">
                                                <input
                                                    {{ (isset($companyDetailsmodel->treating_customers_fairly) && $companyDetailsmodel->treating_customers_fairly == '1' ? 'checked' : '') ?? '' }}
                                                    class="form-check-input" type="radio"
                                                    name="treating_customers_fairly" id="treating_customers_fairly"
                                                    value="1">
                                                <label class="form-check-label"
                                                    for="treating_customers_fairly">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    {{ (isset($companyDetailsmodel->treating_customers_fairly) && $companyDetailsmodel->treating_customers_fairly == '0' ? 'checked' : '') ?? '' }}
                                                    class="form-check-input" type="radio"
                                                    name="treating_customers_fairly" id="treating_customers_fairly"
                                                    value="0">
                                                <label class="form-check-label" for="treating_customers_fairly">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="from-group">
                                        <label>Are you aware of the new Consumer Duty finding which have been published by
                                            the FCA?</label>
                                        <div class="w-100 d-flex mb-3">
                                            <div class="form-check mr-3">
                                                <input
                                                    {{ (isset($companyDetailsmodel->are_you_aware_of) && $companyDetailsmodel->are_you_aware_of == '1' ? 'checked' : '') ?? '' }}
                                                    class="form-check-input" type="radio" name="are_you_aware_of"
                                                    id="are_you_aware_of" value="1">
                                                <label class="form-check-label" for="are_you_aware_of">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    {{ (isset($companyDetailsmodel->are_you_aware_of) && $companyDetailsmodel->are_you_aware_of == '0' ? 'checked' : '') ?? '' }}
                                                    class="form-check-input" type="radio" name="are_you_aware_of"
                                                    id="are_you_aware_of" value="0">
                                                <label class="form-check-label" for="are_you_aware_of">No</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <div class="from-group">
                                    <label>Will any customer data be transferred outside the UK? If yes, how do you
                                        ensure that you comply with the UK GDPR with such transfers?</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->transferred_outside_uk) && $companyDetailsmodel->transferred_outside_uk == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="transferred_outside_uk"
                                                id="transferred_outside_uk" value="1">
                                            <label class="form-check-label" for="transferred_outside_uk">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->transferred_outside_uk) && $companyDetailsmodel->transferred_outside_uk == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="transferred_outside_uk"
                                                id="transferred_outside_uk" value="0">
                                            <label class="form-check-label" for="transferred_outside_uk">No</label>
                                        </div>
                                    </div>
                                    <div class="transferred_outside_uk_further_information" style="display: none;">
                                        <label>Further Information</label>
                                        <input
                                            value="{{ $companyDetailsmodel->transferred_outside_uk_further_information ?? '' }}"
                                            type="text" class="form-control"
                                            name="transferred_outside_uk_further_information">
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Do you have system and processes in place to manage data subject requests,
                                        i.e. right to delete, request a copy, portability etc.</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->right_to_delete) && $companyDetailsmodel->right_to_delete == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="right_to_delete"
                                                id="right_to_delete" value="1">
                                            <label class="form-check-label" for="right_to_delete">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->right_to_delete) && $companyDetailsmodel->right_to_delete == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="right_to_delete"
                                                id="right_to_delete" value="0">
                                            <label class="form-check-label" for="right_to_delete">No</label>
                                        </div>
                                    </div>

                                    <div class="right_to_delete_further_information" style="display: none;">
                                        <label>Further Information</label>
                                        <input
                                            value="{{ $companyDetailsmodel->right_to_delete_further_information ?? '' }}"
                                            type="text" class="form-control"
                                            name="right_to_delete_further_information">
                                    </div>
                                </div>

                                <p style="font-size: 13px;font-style: italic;">
                                    These policies are required in order for you to utilise our finance service. You may get
                                    these in place within the next 30 days prior to going live or alternatively we can
                                    provide these for you to personalise for £10 per policy.
                                </p>

                                <div class="from-group btn-step float-right">
                                    <a id="step2-back" href="javascript:void(0);">Back</a>
                                    <a id="step3-next" href="javascript:void(0);">Next</a>
                                </div>


                            </div>

                            <div class="question-area-four" id="question_areaFour">
                                <div class="step_number">
                                    <p>Step 4/7</p>
                                    <h2>Compliance</h2>
                                </div>



                                <div class="from-group">
                                    <label>Please describe how will you obtain customers? (i.e. via outbound calls,
                                        online, adverts, social media such as Facebook, Messenger etc </label>
                                    <input type="text" class="form-control"
                                        value="{{ $companyDetailsmodel->obtain_customers ?? '' }}"
                                        name="obtain_customers">
                                </div>


                                <div class="from-group">
                                    <label>
                                        In line with treating customers fairly you must keep all of your prices the same
                                        regardless of the clients chosen payment method. This means you are not allowed to
                                        charge more for treatments/training if a customer takes finance. Please accept your
                                        are agreeable to this compulsory term.</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->manage_any_conflict) && $companyDetailsmodel->manage_any_conflict == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="manage_any_conflict"
                                                id="manage_any_conflict" value="1">
                                            <label class="form-check-label" for="manage_any_conflict">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->manage_any_conflict) && $companyDetailsmodel->manage_any_conflict == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="manage_any_conflict"
                                                id="manage_any_conflict" value="0">
                                            <label class="form-check-label" for="manage_any_conflict">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Do you keep a complaint log detailing details of complaints received, and
                                        redress paid?</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->keep_a_complaint_log) && $companyDetailsmodel->keep_a_complaint_log == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="keep_a_complaint_log"
                                                id="keep_a_complaint_log" value="1">
                                            <label class="form-check-label" for="keep_a_complaint_log">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->keep_a_complaint_log) && $companyDetailsmodel->keep_a_complaint_log == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="keep_a_complaint_log"
                                                id="keep_a_complaint_log" value="0">
                                            <label class="form-check-label" for="keep_a_complaint_log">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Do you confirm that as your Principal, IAR of CFG will have the final
                                        decision on
                                        any complaints received from consumers about your activity while you are an AR
                                        of CFG?</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->you_are_an_ar) && $companyDetailsmodel->you_are_an_ar == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="you_are_an_ar"
                                                id="you_are_an_ar" value="1">
                                            <label class="form-check-label" for="you_are_an_ar">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->you_are_an_ar) && $companyDetailsmodel->you_are_an_ar == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="you_are_an_ar"
                                                id="you_are_an_ar" value="0">
                                            <label class="form-check-label" for="you_are_an_ar">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Do you confirm that you will notify CFG as your Principal of the following
                                        matters at least 10 working days before the change occurs (this list is not
                                        exhaustive):</label>
                                    <ul class="form-list">
                                        <li>Any change in the company details- name, trading name, registered or trading
                                            address, company type, websites, email, telephone number, main person
                                            contact details etc.</li>
                                        <li>Any change in senior managers</li>
                                        <li>Any change in owners or directors</li>
                                        <li>Changes in personnel that provide or relate to providing debt counselling
                                        </li>
                                        <li>Andy change in marketing strategy</li>
                                        <li>Any changes in the business or business activity </li>
                                    </ul>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->do_you_confirm) && $companyDetailsmodel->do_you_confirm == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="do_you_confirm"
                                                id="do_you_confirm" value="1">
                                            <label class="form-check-label" for="do_you_confirm">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->do_you_confirm) && $companyDetailsmodel->do_you_confirm == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="do_you_confirm"
                                                id="do_you_confirm" value="0">
                                            <label class="form-check-label" for="do_you_confirm">No</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="from-group">
                                    <label>You confirm that you will notify us no later than 3 business days of the
                                        following matters occurring:</label>

                                    <ul class="form-list">
                                        <li>Any disciplinary action taken against any personnel in the company (this is
                                            not limited to advisers)</li>
                                        <li>Any actual or threatened legal action against your company or its directors
                                        </li>
                                        <li>Any actual or threatened investigation by any regulatory body</li>
                                        <li>Any data breaches</li>
                                        <li>Changes in your Professional Indemnity Cover</li>
                                        <li>Any other matter that we would expect you to reasonably notify CFG of.</li>
                                    </ul>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->you_confirm_that) && $companyDetailsmodel->you_confirm_that == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="you_confirm_that"
                                                id="you_confirm_that" value="1">
                                            <label class="form-check-label" for="you_confirm_that">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->you_confirm_that) && $companyDetailsmodel->you_confirm_that == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="you_confirm_that"
                                                id="you_confirm_that" value="0">
                                            <label class="form-check-label" for="you_confirm_that">No</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="from-group btn-step float-right">
                                    <a id="step3-back" href="javascript:void(0);">Back</a>
                                    <a id="step4-next" href="javascript:void(0);">Next</a>
                                </div>

                            </div>


                            <div class="question-area-five" id="question_areaFive">
                                <div class="step_number">
                                    <p>Step 5/7</p>
                                    <h2>Fitness and Propriety</h2>
                                </div>


                                <div class="from-group">
                                    <label>Have you (the company) in the last five years been the subject matter of any
                                        civil or criminal investigation or actual legal proceedings, whether in the UK
                                        or other jurisdiction? <br>If ‘yes’ please explain.</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->subject_matter_company) && $companyDetailsmodel->subject_matter_company == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="subject_matter_company"
                                                id="subject_matter_company" value="1">
                                            <label class="form-check-label" for="subject_matter_company">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->subject_matter_company) && $companyDetailsmodel->subject_matter_company == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="subject_matter_company"
                                                id="subject_matter_company" value="0">
                                            <label class="form-check-label" for="subject_matter_company">No</label>
                                        </div>
                                    </div>
                                    <div class="subject_matter_company_further_information" style="display: none;">
                                        <label>Further Information</label>
                                        <input type="text"
                                            value="{{ $companyDetailsmodel->subject_matter_company_further_information ?? '' }}"
                                            class="form-control" name="subject_matter_company_further_information">
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Has any Director of the Company or a senior Manager in the last five years
                                        been the subject matter of any civil or criminal investigation or actual legal
                                        proceedings, whether in the UK or other jurisdiction? <br>If ‘yes’ please
                                        explain.</label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->subject_matter_director) && $companyDetailsmodel->subject_matter_director == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="subject_matter_director"
                                                id="subject_matter_director" value="1">
                                            <label class="form-check-label" for="subject_matter_director">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->subject_matter_director) && $companyDetailsmodel->subject_matter_director == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="subject_matter_director"
                                                id="subject_matter_director" value="0">
                                            <label class="form-check-label" for="subject_matter_director">No</label>
                                        </div>
                                    </div>
                                    <div class="subject_matter_director_further_information" style="display: none;">
                                        <label>Further Information</label>
                                        <input type="text"
                                            value="{{ $companyDetailsmodel->subject_matter_director_further_information ?? '' }}"
                                            class="form-control" name="subject_matter_director_further_information">
                                    </div>
                                </div>


                                <div class="from-group">
                                    <label>Do you consent to CFG carrying out audits, which may include but are not limited
                                        to visits to your site(s), access to customer communications, data consents
                                        and/or call recordings and financial data in relation to income related to your
                                        Appointed Representative? </label>
                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->allow_cfg) && $companyDetailsmodel->allow_cfg == '1' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="allow_cfg" id="allow_cfg"
                                                value="1">
                                            <label class="form-check-label" for="allow_cfg">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->allow_cfg) && $companyDetailsmodel->allow_cfg == '0' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="allow_cfg" id="allow_cfg"
                                                value="0">
                                            <label class="form-check-label" for="allow_cfg">No</label>
                                        </div>
                                    </div>

                                    <div class="allow_cfg_please_explain_why" style="display: none;">
                                        <label>Please explain why</label>
                                        <input type="text"
                                            value="{{ $companyDetailsmodel->allow_cfg_please_explain_why ?? '' }}"
                                            class="form-control" name="allow_cfg_please_explain_why">
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label>Please confirm if requested that you will provide on a monthly basis report which
                                        will
                                        include:</label>
                                    <ul class="list-inline">
                                        <li>- Complaints</li>
                                        <li>- Cases worked</li>
                                        <li>- Commission paid to you and by whom</li>
                                        <li>- Breakdown of solutions recommend (including free sector referrals); and
                                        </li>
                                        <li>- Any other information reasonably requested by CFG to meet with its FCA
                                            obligations from time to time.</li>
                                    </ul>

                                    <div class="w-100 d-flex mb-3">
                                        <div class="form-check mr-3">
                                            <input
                                                {{ (isset($companyDetailsmodel->monthly_basis_report) && $companyDetailsmodel->monthly_basis_report == 'Yes' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="monthly_basis_report"
                                                id="monthly_basis_report" value="Yes">
                                            <label class="form-check-label" for="monthly_basis_report">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                {{ (isset($companyDetailsmodel->monthly_basis_report) && $companyDetailsmodel->monthly_basis_report == 'No' ? 'checked' : '') ?? '' }}
                                                class="form-check-input" type="radio" name="monthly_basis_report"
                                                id="monthly_basis_report" value="No">
                                            <label class="form-check-label" for="monthly_basis_report">No</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="from-group">
                                    <label>Please provide any further information you think will be helpful.</label>
                                    <input type="text"
                                        value="{{ $companyDetailsmodel->further_information_box_opposite ?? '' }}"
                                        class="form-control" name="further_information_box_opposite">
                                </div>

                                <div class="from-group btn-step float-right">
                                    <a id="step4-back" href="javascript:void(0);">Back</a>
                                    <a id="step5-next" href="javascript:void(0);">Next</a>
                                </div>

                            </div>

                            <div class="question-area-six" id="question_areaSix">
                                <div class="step_number">
                                    <p>Step 6/7</p>
                                    <h2>I confirm that the details given in the form are to my best knowledge and
                                        belief,
                                        true and accurate. I understand that any misleading, incomplete, or inaccurate
                                        information could delay my application, or it can be suspended/withdrawn by CFG.
                                    </h2>
                                    <p>NOTE: This Form must be signed by the person who will be applying to be the
                                        introducer appointed representative or a Director of the Company.</p>
                                </div>

                                <div class="from-group">
                                    <label>Name</label>
                                    <input type="text" value="{{ $companyDetailsmodel->name ?? '' }}"
                                        class="form-control" name="name">
                                </div>
                                {{-- <div class="from-group">
                                    <label>Signature</label>
                                    <input type="text" value="{{ $companyDetailsmodel->signature ?? '' }}"
                                        class="form-control" name="signature">
                                </div> --}}

                                <div class="from-group">
                                    <label>Signature</label>


                                    <div id="signature-pad" class="signature-pad">
                                        <div class="signature-pad--body">
                                            <canvas></canvas>
                                        </div>
                                        <div class="signature-pad--footer">
                                            <div class="description">Sign above</div>

                                            <div class="signature-pad--actions">
                                                <div class="column">
                                                    <button type="button" class="button clear btn btn-secondary"
                                                        data-action="clear">Clear</button>
                                                    {{-- <button type="button" class="button"
                                                        data-action="change-background-color">Change background
                                                        color</button>
                                                    <button type="button" class="button"
                                                        data-action="change-color">Change color</button>
                                                    <button type="button" class="button"
                                                        data-action="change-width">Change width</button> --}}
                                                    <button type="button" class="button btn btn-secondary"
                                                        data-action="undo">Undo</button>

                                                </div>

                                                <input type="hidden" name="signature" class="signature">

                                                <div class="column" style="display: none;">
                                                    <button type="button" class="button save save-png"
                                                        data-action="save-png">Save as PNG</button>
                                                    <button type="button" class="button save"
                                                        data-action="save-jpg">Save as JPG</button>
                                                    <button type="button" class="button save"
                                                        data-action="save-svg">Save as SVG</button>
                                                    <button type="button" class="button save"
                                                        data-action="save-svg-with-background">Save as SVG with
                                                        background</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if (isset($companyDetailsmodel->signature) && $companyDetailsmodel->signature != '')
                                        <img style="height: 180px;"
                                            src="{{ asset('uploads/' . $companyDetailsmodel->signature) }}" />
                                    @endif

                                </div>

                                <div class="from-group">
                                    <label>Position </label>
                                    <input type="text" value="{{ $companyDetailsmodel->position ?? '' }}"
                                        class="form-control" name="position">
                                </div>
                                <div class="from-group">
                                    <label>Date </label>
                                    <input type="text" value="{{ $companyDetailsmodel->date ?? '' }}"
                                        class="form-control" name="date">
                                </div>

                                <div class="from-group">
                                    <label>Photographic Proof of ID </label>
                                    <div class="drop-zone">
                                        <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                        <input type="file" name="id_proof"
                                            accept="image/png, image/gif, image/jpeg, application/pdf, application/msword"
                                            class="drop-zone__input">
                                    </div>
                                    @if (isset($companyDetailsmodel->id_proof) && $companyDetailsmodel->id_proof != '')
                                        <br />
                                        <img src="{{ asset('uploads/' . $companyDetailsmodel->id_proof ?? '') }}"
                                            height="120px">
                                    @endif

                                </div>

                                <div class="from-group">
                                    <label>Proof of personal ( home ) address / utility bill (less than 3 months
                                        old)</label>
                                    <div class="drop-zone">
                                        <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                        <input type="file" name="address_proff"
                                            accept="image/png, image/gif, image/jpeg, application/pdf, application/msword"
                                            class="drop-zone__input">
                                    </div>

                                    @if (isset($companyDetailsmodel->address_proff) && $companyDetailsmodel->address_proff != '')
                                        <br />
                                        <img src="{{ asset('uploads/' . $companyDetailsmodel->address_proff ?? '') }}"
                                            height="120px">
                                    @endif
                                </div>

                                <div class="from-group">
                                    <label>Bank Account of the business - business account or trading account</label>
                                    <div class="drop-zone">
                                        <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                        <input type="file" name="bank_account_proof"
                                            accept="image/png, image/gif, image/jpeg, application/pdf, application/msword"
                                            class="drop-zone__input">
                                    </div>

                                    @if (isset($companyDetailsmodel->bank_account_proof) && $companyDetailsmodel->bank_account_proof != '')
                                        <br />
                                        <img src="{{ asset('uploads/' . $companyDetailsmodel->bank_account_proof ?? '') }}"
                                            height="120px">
                                    @endif
                                </div>

                                <div class="from-group">
                                    <label>Photograph of working space - salon interior </label>
                                    <div class="drop-zone">
                                        <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                        <input type="file" name="photo_of_working_space"
                                            accept="image/png, image/gif, image/jpeg, application/pdf, application/msword"
                                            class="drop-zone__input">
                                    </div>

                                    @if (isset($companyDetailsmodel->photo_of_working_space) && $companyDetailsmodel->photo_of_working_space != '')
                                        <br />
                                        <img src="{{ asset('uploads/' . $companyDetailsmodel->photo_of_working_space ?? '') }}"
                                            height="120px">
                                    @endif
                                </div>

                                @if (isset($isSignup) && $isSignup == 1)
                                    <div class="from-group">
                                        <label>Upload Insurance Document File</label>
                                        <div class="drop-zone">
                                            <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                            <input type="file" name="path"
                                                accept="image/png, image/gif, image/jpeg, application/pdf, application/msword"
                                                class="drop-zone__input">
                                        </div>
                                    </div>
                                @endif

                                {{-- <div class="from-group">
                                    <label>Logo - jpeg format </label>
                                    <div class="drop-zone">
                                        <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                        <input type="file" name="logo"
                                            accept="image/png, image/gif, image/jpeg, application/pdf, application/msword"
                                            class="drop-zone__input">
                                    </div>

                                    @if (isset($companyDetailsmodel->logo) && $companyDetailsmodel->logo != '')
                                        <br />
                                        <img src="{{ asset('uploads/' . $companyDetailsmodel->logo ?? '') }}"
                                            height="120px">
                                    @endif
                                </div> --}}

                                <div class="from-group btn-step float-right">
                                    <a id="step5-back" href="javascript:void(0);">Back</a>
                                    <a id="step6-next" href="javascript:void(0);">Next</a>
                                </div>

                            </div>

                            <div class="question-area-seven" id="question_areaSeven">
                                <div class="step_number">
                                    <p>Step 7/7</p>
                                    <h2>Please Read Carefully</h2>
                                    <h6>Please ensure that you carefully double check ALL details supplied to us prior
                                        to
                                        submitting your form.</h6>
                                    <h6>Errors & incorrect information may result in initial system set up failure -
                                        This
                                        will cause problems/delays with you receiving customer payments.</h6>
                                    <h6>Please note we aim to have all clinics live within an estimated time frame of 30
                                        days from the date we have received ALL information required.</h6>
                                    <h6>We look forward to working along site you, thank you for choosing us.</h6>

                                </div>

                                <div class="from-group">
                                    <label>CFG</label>
                                    <div class="form-check">
                                        <input required checked class="form-check-input" type="checkbox"
                                            value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I've read and agree to these terms
                                        </label>
                                    </div>
                                </div>
                                <div class="from-group btn-step float-right">
                                    <a href="javascript:void(0);" class="submitForm">Submit</a>
                                    @if (Auth::check() && Auth::user()->role == 0)
                                        <button type="submit" style="display: none;" value="saveandcompletelater"
                                            name="saveandcompletelater"
                                            class="btn btn-primary saveandcompletelaterBtn">Save
                                            and
                                            Complete Later</button>
                                        {{-- <a href="javascript:void(0);" class="submitFormCompleteLater">Save and
                                            Complete Later</a> --}}
                                    @endif
                                    <a id="step6-back" href="javascript:void(0);">Back</a>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>


            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('page-css')
    <style>
        .form-group.paymentoption label {
            display: contents;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/signature-pad.css') }}">
@endsection

@section('page-js')
    <script src="{{ asset('js/signature_pad.umd.js') }}"></script>
    <script>
        // multi step from js

        // step 1-2 js

        $("#next").on("click", function() {
            $("#question_areafirst").hide();
            $("#question_areaTwo").show();

            $('html, body').animate({
                scrollTop: $("#question_areaTwo").offset().top
            }, 1500);

            $("#step-2").addClass("active");
            $("#step-1").removeClass("active");
        });


        $("#back").on("click", function() {
            $("#question_areaTwo").hide();
            $("#question_areafirst").show();

            $('html, body').animate({
                scrollTop: $("#question_areafirst").offset().top
            }, 2000);

            $("#step-1").addClass("active");
            $("#step-2").removeClass("active");
        });


        // step 2-3 js

        $("#step2-next").on("click", function() {
            $("#question_areaTwo").hide();
            $("#question_areaThird").show();
            $("#step-3").addClass("active");
            $("#step-2").removeClass("active");

            $('html, body').animate({
                scrollTop: $("#question_areaThird").offset().top
            }, 2000);
        });


        $("#step2-back").on("click", function() {
            $("#question_areaThird").hide();
            $("#question_areaTwo").show();
            $("#step-2").addClass("active");
            $("#step-3").removeClass("active");

            $('html, body').animate({
                scrollTop: $("#question_areaTwo").offset().top
            }, 2000);
        });


        // step 3-4 js

        $("#step3-next").on("click", function() {
            $("#question_areaThird").hide();
            $("#question_areaFour").show();
            $("#step-4").addClass("active");
            $("#step-3").removeClass("active");

            $('html, body').animate({
                scrollTop: $("#question_areaFour").offset().top
            }, 2000);
        });


        $("#step3-back").on("click", function() {
            $("#question_areaFour").hide();
            $("#question_areaThird").show();
            $("#step-3").addClass("active");
            $("#step-4").removeClass("active");

            $('html, body').animate({
                scrollTop: $("#question_areaThird").offset().top
            }, 2000);
        });


        // step 4-5 js

        $("#step4-next").on("click", function() {
            $("#question_areaFour").hide();
            $("#question_areaFive").show();
            $("#step-5").addClass("active");
            $("#step-4").removeClass("active");

            $('html, body').animate({
                scrollTop: $("#question_areaFive").offset().top
            }, 2000);
        });


        $("#step4-back").on("click", function() {
            $("#question_areaFive").hide();
            $("#question_areaFour").show();
            $("#step-4").addClass("active");
            $("#step-5").removeClass("active");

            $('html, body').animate({
                scrollTop: $("#question_areaFour").offset().top
            }, 2000);
        });


        // step 5-6 js

        $("#step5-next").on("click", function() {
            $("#question_areaFive").hide();
            $("#question_areaSix").show();
            $("#step-6").addClass("active");
            $("#step-5").removeClass("active");

            $('html, body').animate({
                scrollTop: $("#question_areaSix").offset().top
            }, 2000);

            resizeCanvas();

        });


        $("#step5-back").on("click", function() {
            $("#question_areaSix").hide();
            $("#question_areaFive").show();
            $("#step-5").addClass("active");
            $("#step-6").removeClass("active");

            $('html, body').animate({
                scrollTop: $("#question_areaFive").offset().top
            }, 2000);
        });


        //  step 6-7 js


        $("#step6-next").on("click", function() {
            $("#question_areaSix").hide();
            $("#question_areaSeven").show();
            $("#step-7").addClass("active");
            $("#step-6").removeClass("active");

            $('html, body').animate({
                scrollTop: $("#question_areaSeven").offset().top
            }, 2000);

            $(".save-png").trigger('click');
        });


        $("#step6-back").on("click", function() {
            $("#question_areaSeven").hide();
            $("#question_areaSix").show();
            $("#step-6").addClass("active");
            $("#step-7").removeClass("active");

            $('html, body').animate({
                scrollTop: $("#question_areaSix").offset().top
            }, 2000);
        });

        $("#step7-next").on("click", function() {
            $("#signup").hide();
        });

        // Input hide Show Js
        @if ($companyDetailsmodel)
            @if ($companyDetailsmodel->owner_director_company == 0)
                $(".further-information").show();
            @endif

            @if ($companyDetailsmodel->member_of_trade_body == 1)
                $(".registration-number").show();
            @else
                $(".registration-number-no").show();
            @endif

            @if ($companyDetailsmodel->if_no_is_it == 'Other')
                $(".please-state").show();
            @endif


            @if ($companyDetailsmodel->appointed_representative == 1)
                $(".next-questions").show();
            @endif

            @if ($companyDetailsmodel->discliplinary_action == 1)
                $(".more-details").show();
            @endif

            @if ($companyDetailsmodel->directors_approved == 1)
                $(".IRN-number").show();
            @endif

            @if ($companyDetailsmodel->carry_out_all == 1)
                $(".carry_out_all_firther_info").show();
            @endif

            @if ($companyDetailsmodel->work_with_third_party_company == 1)
                $(".some-further-information").show();
            @endif

            @if ($companyDetailsmodel->receive_communications == 1)
                $(".opt-requests").show();
            @endif

            @if ($companyDetailsmodel->notified_principal == 1)
                $(".notified_principal_further_information").show();
            @endif

            @if ($companyDetailsmodel->existing_principal == 1)
                $(".existing_principal_further_information").show();
            @endif

            @if ($companyDetailsmodel->previously_made_application == 1)
                $(".previously_made_application_further_information").show();
            @endif

            @if ($companyDetailsmodel->intend_to_made_application == 1)
                $(".intend_to_made_application_further_information").show();
            @endif

            @if ($companyDetailsmodel->subject_matter_company == 1)
                $(".subject_matter_company_further_information").show();
            @endif

            @if ($companyDetailsmodel->subject_matter_director == 1)
                $(".subject_matter_director_further_information").show();
            @endif

            @if ($companyDetailsmodel->allow_cfg == 0)
                $(".allow_cfg_please_explain_why").show();
            @endif

            @if ($companyDetailsmodel->transferred_outside_uk == 1)
                $(".transferred_outside_uk_further_information").show();
            @endif

            @if ($companyDetailsmodel->registered_with_ico == 1)
                $(".ico_reference_number").show();
            @endif

            @if ($companyDetailsmodel->right_to_delete == 1)
                $(".right_to_delete_further_information").show();
            @endif
        @endif

        $('input[type=radio][name=owner_director_company]').change(function() {
            if (this.value == 0) {
                $(".further-information").show();
            } else {
                $(".further-information").hide();
            }
        });

        $('input[type=radio][name=member_of_trade_body]').change(function() {

            if (this.value == 0) {
                $(".registration-number").hide();
                $(".registration-number-no").show();
            } else {
                $(".registration-number").show();
                $(".registration-number-no").hide();
            }
        });



        $('input[type=radio][name=if_no_is_it]').change(function() {
            if (this.value == 'Other') {
                $(".please-state").show();
            } else {
                $(".please-state").hide();
            }
        });

        $('input[type=radio][name=appointed_representative]').change(function() {
            if (this.value == 0) {
                $(".next-questions").hide();
            } else {
                $(".next-questions").show();
            }
        });

        $('input[type=radio][name=discliplinary_action]').change(function() {
            if (this.value == 0) {
                $(".more-details").hide();
            } else {
                $(".more-details").show();
            }
        });

        $('input[type=radio][name=directors_approved]').change(function() {
            if (this.value == 0) {
                $(".IRN-number").hide();
            } else {
                $(".IRN-number").show();
            }
        });

        $('input[type=radio][name=carry_out_all]').change(function() {
            if (this.value == 0) {
                $(".carry_out_all_firther_info").hide();
            } else {
                $(".carry_out_all_firther_info").show();
            }
        });

        $('input[type=radio][name=work_with_third_party_company]').change(function() {
            if (this.value == 0) {
                $(".some-further-information").hide();
            } else {
                $(".some-further-information").show();
            }
        });

        $('input[type=radio][name=receive_communications]').change(function() {
            if (this.value == 1) {
                $(".opt-requests").show();
            } else {
                $(".opt-requests").hide();
            }
        });

        $('input[type=radio][name=notified_principal]').change(function() {
            if (this.value == 1) {
                $(".notified_principal_further_information").show();
            } else {
                $(".notified_principal_further_information").hide();
            }
        });

        $('input[type=radio][name=existing_principal]').change(function() {
            if (this.value == 1) {
                $(".existing_principal_further_information").show();
            } else {
                $(".existing_principal_further_information").hide();
            }
        });

        $('input[type=radio][name=previously_made_application]').change(function() {
            if (this.value == 1) {
                $(".previously_made_application_further_information").show();
            } else {
                $(".previously_made_application_further_information").hide();
            }
        });

        $('input[type=radio][name=intend_to_made_application]').change(function() {
            if (this.value == 1) {
                $(".intend_to_made_application_further_information").show();
            } else {
                $(".intend_to_made_application_further_information").hide();
            }
        });

        $('input[type=radio][name=subject_matter_company]').change(function() {
            if (this.value == 1) {
                $(".subject_matter_company_further_information").show();
            } else {
                $(".subject_matter_company_further_information").hide();
            }
        });

        $('input[type=radio][name=subject_matter_director]').change(function() {
            if (this.value == 1) {
                $(".subject_matter_director_further_information").show();
            } else {
                $(".subject_matter_director_further_information").hide();
            }
        });

        $('input[type=radio][name=allow_cfg]').change(function() {
            if (this.value == 0) {
                $(".allow_cfg_please_explain_why").show();
            } else {
                $(".allow_cfg_please_explain_why").hide();
            }
        });

        $('input[type=radio][name=transferred_outside_uk]').change(function() {
            if (this.value == 1) {
                $(".transferred_outside_uk_further_information").show();
            } else {
                $(".transferred_outside_uk_further_information").hide();
            }
        });

        $('input[type=radio][name=registered_with_ico]').change(function() {
            if (this.value == 1) {
                $(".ico_reference_number").show();
            } else {
                $(".ico_reference_number").hide();
            }
        });


        $('input[type=radio][name=right_to_delete]').change(function() {
            if (this.value == 1) {
                $(".right_to_delete_further_information").show();
            } else {
                $(".right_to_delete_further_information").hide();
            }
        });

        $('.submitForm').click(function() {
            $('form.myForm').submit();
        });


        $('.submitFormCompleteLater').click(function() {
            $('.saveandcompletelaterBtn').trigger('click');
        });
        // Drop & Drag Fils images Js 

        document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
            const dropZoneElement = inputElement.closest(".drop-zone");

            dropZoneElement.addEventListener("click", (e) => {
                inputElement.click();
            });

            inputElement.addEventListener("change", (e) => {
                if (inputElement.files.length) {
                    updateThumbnail(dropZoneElement, inputElement.files[0]);
                }
            });

            dropZoneElement.addEventListener("dragover", (e) => {
                e.preventDefault();
                dropZoneElement.classList.add("drop-zone--over");
            });

            ["dragleave", "dragend"].forEach((type) => {
                dropZoneElement.addEventListener(type, (e) => {
                    dropZoneElement.classList.remove("drop-zone--over");
                });
            });

            dropZoneElement.addEventListener("drop", (e) => {
                e.preventDefault();

                if (e.dataTransfer.files.length) {
                    inputElement.files = e.dataTransfer.files;
                    updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
                }

                dropZoneElement.classList.remove("drop-zone--over");
            });
        });

        /**
         * Updates the thumbnail on a drop zone element.
         *
         * @param {HTMLElement} dropZoneElement
         * @param {File} file
         */
        function updateThumbnail(dropZoneElement, file) {
            let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

            // First time - remove the prompt
            if (dropZoneElement.querySelector(".drop-zone__prompt")) {
                dropZoneElement.querySelector(".drop-zone__prompt").remove();
            }

            // First time - there is no thumbnail element, so lets create it
            if (!thumbnailElement) {
                thumbnailElement = document.createElement("div");
                thumbnailElement.classList.add("drop-zone__thumb");
                dropZoneElement.appendChild(thumbnailElement);
            }

            thumbnailElement.dataset.label = file.name;

            // Show thumbnail for image files
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();

                reader.readAsDataURL(file);
                reader.onload = () => {
                    thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
                };
            } else {
                thumbnailElement.style.backgroundImage = null;
            }
        }


        // signaturePad js start
        const wrapper = document.getElementById("signature-pad");
        const clearButton = wrapper.querySelector("[data-action=clear]");
        // const changeBackgroundColorButton = wrapper.querySelector("[data-action=change-background-color]");
        // const changeColorButton = wrapper.querySelector("[data-action=change-color]");
        // const changeWidthButton = wrapper.querySelector("[data-action=change-width]");
        const undoButton = wrapper.querySelector("[data-action=undo]");
        const savePNGButton = wrapper.querySelector("[data-action=save-png]");
        const saveJPGButton = wrapper.querySelector("[data-action=save-jpg]");
        const saveSVGButton = wrapper.querySelector("[data-action=save-svg]");
        const saveSVGWithBackgroundButton = wrapper.querySelector("[data-action=save-svg-with-background]");
        const canvas = wrapper.querySelector("canvas");
        const signaturePad = new SignaturePad(canvas, {
            // It's Necessary to use an opaque color when saving image as JPEG;
            // this option can be omitted if only saving as PNG or SVG
            backgroundColor: 'rgb(255, 255, 255)'
        });

        // Adjust canvas coordinate space taking into account pixel ratio,
        // to make it look crisp on mobile devices.
        // This also causes canvas to be cleared.
        function resizeCanvas() {
            // When zoomed out to less than 100%, for some very strange reason,
            // some browsers report devicePixelRatio as less than 1
            // and only part of the canvas is cleared then.
            const ratio = Math.max(window.devicePixelRatio || 1, 1);

            // This part causes the canvas to be cleared
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);

            // This library does not listen for canvas changes, so after the canvas is automatically
            // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
            // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
            // that the state of this library is consistent with visual state of the canvas, you
            // have to clear it manually.
            //signaturePad.clear();

            // If you want to keep the drawing on resize instead of clearing it you can reset the data.
            signaturePad.fromData(signaturePad.toData());
        }

        // On mobile devices it might make more sense to listen to orientation change,
        // rather than window resize events.
        window.onresize = resizeCanvas;
        resizeCanvas();

        function download(dataURL, filename) {
            const blob = dataURLToBlob(dataURL);
            const url = window.URL.createObjectURL(blob);

            const a = document.createElement("a");
            a.style = "display: none";
            a.href = url;
            a.download = filename;

            document.body.appendChild(a);
            a.click();

            window.URL.revokeObjectURL(url);
        }

        // One could simply use Canvas#toBlob method instead, but it's just to show
        // that it can be done using result of SignaturePad#toDataURL.
        function dataURLToBlob(dataURL) {
            // Code taken from https://github.com/ebidel/filer.js
            const parts = dataURL.split(';base64,');
            const contentType = parts[0].split(":")[1];
            const raw = window.atob(parts[1]);
            const rawLength = raw.length;
            const uInt8Array = new Uint8Array(rawLength);

            for (let i = 0; i < rawLength; ++i) {
                uInt8Array[i] = raw.charCodeAt(i);
            }

            return new Blob([uInt8Array], {
                type: contentType
            });
        }

        clearButton.addEventListener("click", () => {
            signaturePad.clear();
        });

        undoButton.addEventListener("click", () => {
            const data = signaturePad.toData();

            if (data) {
                data.pop(); // remove the last dot or line
                signaturePad.fromData(data);
            }
        });

        // changeBackgroundColorButton.addEventListener("click", () => {
        //     const r = Math.round(Math.random() * 255);
        //     const g = Math.round(Math.random() * 255);
        //     const b = Math.round(Math.random() * 255);
        //     const color = "rgb(" + r + "," + g + "," + b + ")";

        //     signaturePad.backgroundColor = color;
        //     const data = signaturePad.toData();
        //     signaturePad.clear();
        //     signaturePad.fromData(data);
        // });

        // changeColorButton.addEventListener("click", () => {
        //     const r = Math.round(Math.random() * 255);
        //     const g = Math.round(Math.random() * 255);
        //     const b = Math.round(Math.random() * 255);
        //     const color = "rgb(" + r + "," + g + "," + b + ")";

        //     signaturePad.penColor = color;
        // });

        // changeWidthButton.addEventListener("click", () => {
        //     const min = Math.round(Math.random() * 100) / 10;
        //     const max = Math.round(Math.random() * 100) / 10;

        //     signaturePad.minWidth = Math.min(min, max);
        //     signaturePad.maxWidth = Math.max(min, max);
        // });

        savePNGButton.addEventListener("click", () => {
            if (signaturePad.isEmpty()) {
                //alert("Please provide a signature first.");
            } else {
                const dataURL = signaturePad.toDataURL();
                $(".signature").val(dataURL);
                //download(dataURL, "signature.png");
            }
        });

        saveJPGButton.addEventListener("click", () => {
            if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
            } else {
                const dataURL = signaturePad.toDataURL("image/jpeg");
                download(dataURL, "signature.jpg");
            }
        });

        saveSVGButton.addEventListener("click", () => {
            if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
            } else {
                const dataURL = signaturePad.toDataURL('image/svg+xml');
                download(dataURL, "signature.svg");
            }
        });

        saveSVGWithBackgroundButton.addEventListener("click", () => {
            if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
            } else {
                const dataURL = signaturePad.toDataURL('image/svg+xml', {
                    includeBackgroundColor: true
                });
                download(dataURL, "signature.svg");
            }
        });
        // signaturePad js end
    </script>
@endsection
