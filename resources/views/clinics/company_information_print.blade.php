<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $ClinicModel->name ?? '' }}</title>
    <style>
        @page {
            margin-top: 0px;
        }

        body {
            margin-top: 0px;
        }

        {{ $css_data }}
    </style>
</head>

<body>

    <div class="container">
        <div class="row border-bottom py-3">
            <div class="col-12">

                <img style="height:160px;"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/uploads/cosmetic_finance_group.jpeg'))) }}">


            </div>
            <div class="col-12">
                <h2>
                    Company Details[{{ $ClinicModel->name ?? '' }}]
                </h2>
            </div>
        </div>

        <div class="row clinic-information">
            <div class="col-12">
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Completed by</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->completed_by ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Are you the owner/director of the company</div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->owner_director_company == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->owner_director_company == 0)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Further Information</div>
                        <div class="col-12 col-md-5">{{ $companyDetailsModel->further_info ?? '' }}</div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Date form completed</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->date_from_completed ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Sole trader or Ltd company?</div>
                    <div class="col-12 col-md-6">{{ $companyDetailsModel->sole_trader_or_ltd_company ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Company Name/Trading name</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->company_name ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Company Registration Number On Companies House</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->company_registration_no ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">VAT Number (if applicable)</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->vat_no ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Other trading names (please ensure that all trading
                        names
                        entered here are entered on the ICO Fee Payers Register)</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->other_trading_name ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Company Address (please provide trading address also
                        if
                        this is different to the registered address of the company)</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->company_address ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Main Telephone</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->main_telephone ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Clinic Telephone Number (If applicable)</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->clinic_telephone_no ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Email Address</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->email_address ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Please provide your website(s) URL(s), Facebook page
                        URL
                        and details of names/handles on any other social media platform you use (Twitter, Instagram
                        etc.)
                    </div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->website_url ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Please describe the activities that the company
                        carries
                        out.</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->company_activities ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Expected volumes from finance clients over the next
                        12
                        months.
                    </div>
                    <div class="col-12 col-md-5">
                        @if ($companyDetailsModel->expected_volumes == 0)
                            {{ '0-50k' }}
                        @elseif($companyDetailsModel->expected_volumes == 1)
                            {{ '50k- 100k' }}
                        @else
                            {{ 'Over 100k' }}
                        @endif
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Are you a member of a trade body or hold a
                        professional
                        pin registration ?</div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->member_of_trade_body == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->member_of_trade_body == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Registration Number</div>
                        <div class="col-12 col-md-5">{{ $companyDetailsModel->registration_no ?? '' }}</div>
                    </div>
                @else
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">If no is it</div>
                        <div class="col-12 col-md-5">{{ $companyDetailsModel->if_no_is_it ?? '' }}</div>
                    </div>

                    @if ($companyDetailsModel->if_no_is_it == 'Other')
                        <div class="row py-3 border-bottom">
                            <div class="col-12 col-md-6 font-weight-bold">Please State</div>
                            <div class="col-12 col-md-5">{{ $companyDetailsModel->please_state ?? '' }}</div>
                        </div>
                    @endif
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Are you an Appointed Representative for any other FCA
                        authorised company? If so, please provide the name and the activities that you carry out for it
                        and
                        your company Firm Reference Number (FRN).
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->appointed_representative == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->appointed_representative == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">FRN number</div>
                        <div class="col-12 col-md-5">{{ $companyDetailsModel->frn_number ?? '' }}</div>
                    </div>

                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Has any application previously made</div>
                        <div class="col-12 col-md-5">
                            {{ ($companyDetailsModel->previously_made_any_application == 1 ? 'Yes' : 'No') ?? '' }}
                        </div>
                    </div>

                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Do you intend to make an application</div>
                        <div class="col-12 col-md-5">
                            {{ ($companyDetailsModel->intend_to_make_application == 1 ? 'Yes' : 'No') ?? '' }}
                        </div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">If you have an existing Principal, have you notified
                        the
                        Principal of your intention to make an application to become and IAR?
                    </div>
                    <div class="col-12 col-md-5">
                        @if ($companyDetailsModel->notified_principal == 0)
                            {{ 'No' }}
                        @elseif($companyDetailsModel->notified_principal == 1)
                            {{ 'Yes' }}
                        @else
                            {{ 'N/A' }}
                        @endif

                    </div>
                </div>

                @if ($companyDetailsModel->notified_principal == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Further Information</div>
                        <div class="col-12 col-md-5">
                            {{ $companyDetailsModel->notified_principal_further_information ?? '' }}
                        </div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">If you have an existing Principal, will you continue
                        to be
                        an AR of that Principal while being and IAR?
                    </div>
                    <div class="col-12 col-md-5">
                        @if ($companyDetailsModel->existing_principal == 0)
                            {{ 'No' }}
                        @elseif($companyDetailsModel->existing_principal == 1)
                            {{ 'Yes' }}
                        @else
                            {{ 'N/A' }}
                        @endif
                    </div>
                </div>

                @if ($companyDetailsModel->existing_principal == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Further Information</div>
                        <div class="col-12 col-md-5">
                            {{ $companyDetailsModel->existing_principal_further_information ?? '' }}
                        </div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Has any application that you have previously made, either for direct authorisation or as an
                        appointed representative been refused by the FCA, if so why?
                    </div>
                    <div class="col-12 col-md-5">
                        @if ($companyDetailsModel->previously_made_application == 0)
                            {{ 'No' }}
                        @elseif($companyDetailsModel->previously_made_application == 1)
                            {{ 'Yes' }}
                        @else
                            {{ 'N/A' }}
                        @endif
                    </div>
                </div>

                @if ($companyDetailsModel->previously_made_application == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Further Information</div>
                        <div class="col-12 col-md-5">
                            {{ $companyDetailsModel->previously_made_application_further_information ?? '' }}
                        </div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Do you intend to make an application to the FCA for direct authorisation for the activity for
                        which
                        you want to be an IAR within the next 18months?
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->intend_to_made_application == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->intend_to_made_application == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Further Information</div>
                        <div class="col-12 col-md-5">
                            {{ $companyDetailsModel->intend_to_made_application_further_information ?? '' }}
                        </div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Have there been any discliplinary action by the FCA, ICO or any regulatory body in the last 5
                        years
                        ? If yes please give details
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->discliplinary_action == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->discliplinary_action == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">More Details</div>
                        <div class="col-12 col-md-5">
                            {{ $companyDetailsModel->discliplinary_action_more_details ?? '' }}
                        </div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Have any directors been approved by the FCA previously.
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->directors_approved == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->directors_approved == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Individual Reference Number (IRN).</div>
                        <div class="col-12 col-md-5">
                            {{ $companyDetailsModel->individual_reference_number ?? '' }}
                        </div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Please confirm that you do/will have in place processes to verify the integrity and competency
                        of
                        all those that you employ/engage the services of in the provision of cosmetic procedures?
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->cosmetic_procedures == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Do you have indemnity insurance ? (CFG requires that your company has indemnity insurance before
                        trading as an IAR).
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->indemnity_insurance == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                <h2>Use of Third Parties</h2>
                <hr />

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Do you intend to use any other third parties to carry out all or part of the services? If so,
                        please
                        give details
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->carry_out_all == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->carry_out_all == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Further Information</div>
                        <div class="col-12 col-md-5">{{ $companyDetailsModel->carry_out_all_firther_info ?? '' }}
                        </div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Does your company work alongside any third party companies ? (If yes we will require some
                        further
                        information)
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->work_with_third_party_company == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->work_with_third_party_company == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Further Information</div>
                        <div class="col-12 col-md-5">{{ $companyDetailsModel->further_information ?? '' }}</div>
                    </div>
                @endif

                <h2>Data Protection and Security</h2>
                <hr />

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Are you registered with the ICO for data protection purposes
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->registered_with_ico == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->registered_with_ico == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">
                            ICO reference number
                        </div>
                        <div class="col-12 col-md-6">
                            {{ $companyDetailsModel->ico_reference_number ?? '' }}
                        </div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        If your customers receive communications or marketing about your business, have you acquired
                        valid
                        consent?
                    </div>
                    <div class="col-12 col-md-5">

                        @if ($companyDetailsModel->receive_communications == 0)
                            {{ 'No' }}
                        @elseif($companyDetailsModel->receive_communications == 1)
                            {{ 'Yes' }}
                        @else
                            {{ 'N/A' }}
                        @endif


                    </div>
                </div>

                @if ($companyDetailsModel->receive_communications == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">
                            do your customers have an opt-out option?
                        </div>
                        <div class="col-12 col-md-5">
                            {{ ($companyDetailsModel->opt_out_requests == 1 ? 'Yes' : 'No') ?? '' }}
                        </div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Data Protection Policy
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->protection_policy == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Privacy Policy/Notice
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->privacy_policy == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Treating Customers Fairly
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->treating_customers_fairly == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Are you aware of the new Consumer Duty finding which have been published by
                        the FCA?
                    </div>
                    <div class="col-12 col-md-6">
                        {{ ($companyDetailsModel->are_you_aware_of == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Will any customer data be transferred outside the UK? If yes, how do you ensure that you comply
                        with
                        the UK GDPR with such transfers?
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->transferred_outside_uk == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->transferred_outside_uk == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Further Information</div>
                        <div class="col-12 col-md-5">
                            {{ $companyDetailsModel->transferred_outside_uk_further_information ?? '' }}</div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Do you have system and processes in place to manage data subject requests, i.e. right to delete,
                        request a copy, portability etc.
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->right_to_delete == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->right_to_delete == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Further Information</div>
                        <div class="col-12 col-md-5">
                            {{ $companyDetailsModel->right_to_delete_further_information ?? '' }}</div>
                    </div>
                @endif

                <h2>Compliance</h2>
                <hr />

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Please describe how will you obtain customers? (i.e.
                        via
                        outbound calls, online, adverts, social media such as Facebook, Messenger etc</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->obtain_customers ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        In line with treating customers fairly you must keep all of your prices the same regardless of
                        the
                        clients chosen payment method. This means you are not allowed to charge more for
                        treatments/training
                        if a customer takes finance. Please accept your are agreeable to this compulsory term.
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->manage_any_conflict == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Do you keep a complaint log detailing details of complaints received, and redress paid?
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->keep_a_complaint_log == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Do you confirm that as your Principal, IAR of CFG will have the final decision on any complaints
                        received from consumers about your activity while you are an AR of CFG?
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->you_are_an_ar == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Do you confirm that you will notify CFG as your Principal of the following matters at least 10
                        working days before the change occurs (this list is not exhaustive):
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->do_you_confirm == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        You confirm that you will notify us no later than 3 business days of the following matters
                        occurring:
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->you_confirm_that == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                <h2>Fitness and Propriety</h2>
                <hr />

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Have you (the company) in the last five years been the subject matter of any civil or criminal
                        investigation or actual legal proceedings, whether in the UK or other jurisdiction?
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->subject_matter_company == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->subject_matter_company == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Further Information</div>
                        <div class="col-12 col-md-5">
                            {{ $companyDetailsModel->subject_matter_company_further_information ?? '' }}</div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Has any Director of the Company or a senior Manager in the last five years been the subject
                        matter
                        of any civil or criminal investigation or actual legal proceedings, whether in the UK or other
                        jurisdiction?
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->subject_matter_director == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->subject_matter_director == 1)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Further Information</div>
                        <div class="col-12 col-md-5">
                            {{ $companyDetailsModel->subject_matter_director_further_information ?? '' }}</div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">
                        Do you consent to CFG carrying out audits, which may include but are not limited to visits to
                        your
                        site(s), access to customer communications, data consents and/or call recordings and financial
                        data
                        in relation to income related to your Appointed Representative?
                    </div>
                    <div class="col-12 col-md-5">
                        {{ ($companyDetailsModel->allow_cfg == 1 ? 'Yes' : 'No') ?? '' }}
                    </div>
                </div>

                @if ($companyDetailsModel->allow_cfg == 0)
                    <div class="row py-3 border-bottom">
                        <div class="col-12 col-md-6 font-weight-bold">Please explain why</div>
                        <div class="col-12 col-md-6">
                            {{ $companyDetailsModel->allow_cfg_please_explain_why ?? '' }}</div>
                    </div>
                @endif

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Please confirm if requested that you will provide
                        on
                        a
                        monthly basis report which will include:</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->monthly_basis_report ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Please provide any further information you think
                        will
                        be
                        helpful.</div>
                    <div class="col-12 col-md-5">
                        {{ $companyDetailsModel->further_information_box_opposite ?? '' }}
                    </div>
                </div>

                <h2>Confirm</h2>
                <hr />

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Name</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->name ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Signature</div>
                    <div class="col-12 col-md-5">
                        @if ($companyDetailsModel->signature != '')
                            <img style="height:160px;"
                                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/uploads/' . $companyDetailsModel->signature))) }}">
                        @endif
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Position</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->position ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Date</div>
                    <div class="col-12 col-md-5">{{ $companyDetailsModel->date ?? '' }}</div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Photographic Proof of ID</div>
                    <div class="col-12 col-md-5">
                        @if ($companyDetailsModel->id_proof != '')
                            <a target="_blank" href="{{ asset('uploads/' . $companyDetailsModel->id_proof) }}"
                                target="_blank">View
                                File</a>
                        @endif

                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Proof of personal ( home ) address / utility bill
                        (less than 3 months old)
                    </div>
                    <div class="col-12 col-md-5">
                        @if ($companyDetailsModel->address_proff != '')
                            <a target="_blank" href="{{ asset('uploads/' . $companyDetailsModel->address_proff) }}"
                                target="_blank">View
                                File</a>
                        @endif
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Bank Account of the business - business account
                        or
                        trading account
                    </div>
                    <div class="col-12 col-md-5">
                        @if ($companyDetailsModel->bank_account_proof != '')
                            <a target="_blank"
                                href="{{ asset('uploads/' . $companyDetailsModel->bank_account_proof) }}"
                                target="_blank">View
                                File</a>
                        @endif
                    </div>
                </div>

                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Photograph of working space - salon interior
                    </div>
                    <div class="col-12 col-md-5">
                        @if ($companyDetailsModel->photo_of_working_space != '')
                            <a target="_blank"
                                href="{{ asset('uploads/' . $companyDetailsModel->photo_of_working_space) }}"
                                target="_blank">View
                                File</a>
                        @endif
                    </div>
                </div>

                {{-- <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Logo - jpeg format
                    </div>
                    <div class="col-12 col-md-5">
                        @if ($companyDetailsModel->logo != '')
                            <a target="_blank" href="{{ asset('uploads/' . $companyDetailsModel->logo) }}"
                                target="_blank">View
                                File</a>
                        @endif
                    </div>
                </div> --}}


            </div>
        </div>
    </div>
</body>

</html>
