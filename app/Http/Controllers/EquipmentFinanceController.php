<?php


namespace App\Http\Controllers;

use App\EquipmentFinance;
use App\Mail\EquipmentFinanceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Facades\Auth;


class EquipmentFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('equipmentFinance.index');
    }
    
    public function financeProduct()
    {
        return view('equipmentFinance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
      


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'contact_address_line_1' => 'required',
            'contact_city' => 'required',
            'contact_zip_code' => 'required',
            'home_owner' => 'required',
            'dob' => 'required',
            'company' => 'required',
            'trade_style' => 'required',
            'annual_turnover' => 'required',
            'credit_search' => 'required',
            'needs_identified' => 'required',
            'purchasing_from' => 'required',
            'cost_of_equipment' => 'required',
            'dob' => 'required',
        ]);

        $input['home_owner'] = $request->home_owner;
        $input['trade_style'] = $request->trade_style;
        $input['credit_search'] = $request->credit_search;

        if ($request->hasFile('previous_year') && $request->file('previous_year')->isValid()) {
            $previous_year = time() . str_random(5) . '.' . $request->previous_year->extension();
            $request->previous_year->move(public_path('finance_doc'), $previous_year);
            $input['previous_year'] = $previous_year;
        }

        if ($request->hasFile('bank_statement') && $request->file('bank_statement')->isValid()) {
            $bank_statement = time() . str_random(5) . '.' . $request->bank_statement->extension();
            $request->bank_statement->move(public_path('finance_doc'), $bank_statement);
            $input['bank_statement'] = $bank_statement;
        }

        if (isset($request['signature']) && !empty($request['signature']) && !is_null($request['signature'])) {

            $img = $request->signature;
            $folderPath = public_path() . '/uploads/';

            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $uniqid = uniqid();
            $file = $uniqid . '.' . $image_type;
            $input['signature'] = $file;
            file_put_contents($folderPath . $file, $image_base64);
        }


         Mail::to("hello@cosmeticfinancegroup.co.uk")
             ->cc(['rebecca@cosmeticfinancegroup.co.uk'])
             ->send(new EquipmentFinanceMail($input));
        EquipmentFinance::create($input);
        return redirect()->route('equipment-finance.index')->with('alert-success', 'Details has been successfully submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function downloadFinanceInquiryData($id)
    {
        if (Auth::user()->role == 0) {
            dd('You are not admin');
        }

        $css = 'css/main.css';
        $data_type = pathinfo($css, PATHINFO_EXTENSION);
        $css_data = file_get_contents($css);


        $EquipmentFinance = EquipmentFinance::where('id', $id)->first();
      

        $pdf = PDF::loadView('catalogue.finance_information_print', compact('EquipmentFinance', 'css_data'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download($EquipmentFinance->name . '.pdf');
    }
    
}
