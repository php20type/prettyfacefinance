<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $EquipmentFinance->name ?? '' }}</title>
    <style>
        @page {
            size: a4 landscape; 
            margin-top: 0px;
        }

        body {
            margin-top: 0px;
            font-family: Times New Roman;
            font-size: 33px;
        }
        {{ $css_data }}
    </style>
</head>

<body>

    <div class="container">
        <div class="row border-bottom py-3" style="text-align:center;">
            <div class="col-12">

                <img style="height:160px;"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/uploads/cosmetic_finance_group.jpeg'))) }}">


            </div>
            <div class="col-12">
                <h2>
                    Equipment Finance Enquiry #{{ $EquipmentFinance->id }} - Detail
                </h2>
            </div>
        </div>

        <div class="">
            <div class="">
               
              
             <table class="table table-striped">
                        <tr>
                            <td>Name</td>
                            <td>{{ $EquipmentFinance->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $EquipmentFinance->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{ $EquipmentFinance->phone }}</td>
                        </tr>
                        <tr>
                            <td>Contact Address 1</td>
                            <td>{{ $EquipmentFinance->contact_address_line_1 }}</td>
                        </tr>
                        <tr>
                            <td>Contact Address 2</td>
                            <td>{{ $EquipmentFinance->contact_address_line_2 }}</td>
                        </tr>
                        <tr>
                            <td>Contact City</td>
                            <td>{{ $EquipmentFinance->contact_city }}</td>
                        </tr>
                        <tr>
                            <td>Contact Zip Code</td>
                            <td>{{ $EquipmentFinance->contact_zip_code }}</td>
                        </tr>

                        <tr>
                            <td>Are you a home owner?</td>
                            <td>{{ $EquipmentFinance->home_owner }}</td>
                        </tr>
                        <tr>
                            <td>DOB</td>
                            <td>{{ $EquipmentFinance->dob }}</td>
                        </tr>
                        <tr>
                            <td>Please list any existing lending you have</td>
                            <td>{{ $EquipmentFinance->existing_lending }}</td>
                        </tr>
                        <tr>
                            <td>Company</td>
                            <td>{{ $EquipmentFinance->company }}</td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td>{{ $EquipmentFinance->website }}</td>
                        </tr>
                        <tr>
                            <td>Company Address 1</td>
                            <td>{{ $EquipmentFinance->address_line_1 }}</td>
                        </tr>
                        <tr>
                            <td>Company Address 2</td>
                            <td>{{ $EquipmentFinance->address_line_2 }}</td>
                        </tr>
                        <tr>
                            <td>Company City</td>
                            <td>{{ $EquipmentFinance->city }}</td>
                        </tr>
                        <tr>
                            <td>Company Zip Code</td>
                            <td>{{ $EquipmentFinance->zip_code }}</td>
                        </tr>

                        <tr>
                            <td>Registered Office Address 1</td>
                            <td>{{ $EquipmentFinance->reg_address_line_1 }}</td>
                        </tr>
                        <tr>
                            <td>Registered Office Address 2</td>
                            <td>{{ $EquipmentFinance->reg_address_line_2 }}</td>
                        </tr>
                        <tr>
                            <td>Registered Office City</td>
                            <td>{{ $EquipmentFinance->reg_city }}</td>
                        </tr>
                        <tr>
                            <td>Registered Office Zip Code</td>
                            <td>{{ $EquipmentFinance->reg_zip_code }}</td>
                        </tr>

                        <tr>
                            <td>Trading Style</td>
                            <td>{{ $EquipmentFinance->trade_style }}</td>
                        </tr>
                        <tr>
                            <td>Company Registration Number</td>
                            <td>{{ $EquipmentFinance->company_reg_number }}</td>
                        </tr>
                        <tr>
                            <td>When was your business established</td>
                            <td>{{ $EquipmentFinance->business_established_date }}</td>
                        </tr>
                        <tr>
                            <td>Accounts for previous year</td>
                            <td>
                                @if($EquipmentFinance->previous_year!='')
                                    <a href="{{ asset('finance_doc/'.$EquipmentFinance->previous_year) }}" target="_blank">
                                        View File
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Annual Turnover</td>
                            <td>{{ $EquipmentFinance->annual_turnover }}</td>
                        </tr>
                        <tr>
                            <td>Gross profit</td>
                            <td>{{ $EquipmentFinance->gross_profit }}</td>
                        </tr>
                        <tr>
                            <td>Net profit</td>
                            <td>{{ $EquipmentFinance->net_profit }}</td>
                        </tr>
                        <tr>
                            <td>Details of any other Directors</td>
                            <td>{{ $EquipmentFinance->any_other_directors }}</td>
                        </tr>
                        <tr>
                            <td>Do you give consent for credit search</td>
                            <td>{{ $EquipmentFinance->credit_search }}</td>
                        </tr>
                        <tr>
                            <td>Bank Statements</td>
                            <td>
                                @if($EquipmentFinance->bank_statement!='')
                                    <a href="{{ asset('finance_doc/'.$EquipmentFinance->bank_statement) }}" target="_blank">
                                        View File
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Needs indentified</td>
                            <td>{{ $EquipmentFinance->needs_identified }}</td>
                        </tr>
                        <tr>
                            <td>Company you are purchasing from</td>
                            <td>{{ $EquipmentFinance->purchasing_from }}</td>
                        </tr>
                        <tr>
                            <td>Cost of equipment</td>
                            <td>{{ $EquipmentFinance->cost_of_equipment }}</td>
                        </tr>
                        <tr>
                            <td>Term required for repayment</td>
                            <td>{{ $EquipmentFinance->term_required }}</td>
                        </tr>
                        <tr>
                            <td>Return on Investment</td>
                            <td>{{ $EquipmentFinance->return_on_investment }}</td>
                        </tr>
                        <tr>
                            <td>Any other information you feel relevant</td>
                            <td>{{ $EquipmentFinance->other_info }}</td>
                        </tr>
                        <tr>
                            <td>Signature</td>
                            <td>
                                @if($EquipmentFinance->signature!='')
                                    <a href="{{ asset('uploads/'.$EquipmentFinance->signature) }}" target="_blank">
                                        View File
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Untitled</td>
                            <td>{{ $EquipmentFinance->Untitled }}</td>
                        </tr>
                       
                    </table>


            </div>
        </div>
    </div>
</body>

</html>
