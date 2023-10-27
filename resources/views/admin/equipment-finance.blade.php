@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-3">

        <table class="table table-striped table-hover w-100">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Email Address</td>
                    <td>Contact Number</td>
                    <td>Created At</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($EquipmentFinances as $EquipmentFinanceValue)
                    <tr>
                        <td>{{ $EquipmentFinanceValue->name }}</td>
                        <td>{{ $EquipmentFinanceValue->email }}</td>
                        <td>{{ $EquipmentFinanceValue->phone }}</td>
                        <td>{{ date('m-d-Y', strtotime($EquipmentFinanceValue->created_at)) }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-brand-primary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#finance_{{ $EquipmentFinanceValue->id }}">View</a>
                                        
                                    <a class="dropdown-item" target="_blank" href="{{ route('download.finance',['id' => $EquipmentFinanceValue->id]) }}">Download</a>    
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @foreach ($EquipmentFinances as $EquipmentFinance)
    <div class="modal fade" id="finance_{{ $EquipmentFinance->id }}" tabindex="-1" role="dialog" aria-labelledby=""
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Equipment Finance Enquiry #{{ $EquipmentFinance->id }} - Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="mailto:{{ $EquipmentFinance->email }}" class="btn btn-primary">Reply</a>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <div class="row">
        <div class="col-12">
            {{ $EquipmentFinances->links() }}
        </div>
    </div>
@endsection
