<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Http\Request;
use PDF;

class SignContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ContractModel = Contract::where('clinic_id', $id)->first();
        if (!empty($ContractModel)) {
            return view('signcontract.show', compact('id', 'ContractModel'));
        }
        return view('signcontract.index', compact('id'));
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
        $input = $request->all();

        if (isset($request['signature']) && !empty($request['signature'])) {

            $img = $request->signature;
            $folderPath = public_path() . '/uploads/'; //path location

            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $uniqid = uniqid();
            $file = $uniqid . '.' . $image_type;
            $input['signature'] = $file;
            file_put_contents($folderPath . $file, $image_base64);
        }

        $input['clinic_id'] = $id;
        $ContractModel = Contract::where('clinic_id', $input['clinic_id'])->first();
        if (empty($ContractModel)) {
            $input['signature_date'] = date("Y-m-d", strtotime($input['signature_date']));
            $input['date'] = date("Y-m-d", strtotime($input['date']));

            Contract::create($input);
        }
        $request->session()->flash('alert-success', 'Contract signed successfully.');
        return redirect('clinics/' . $id . '/edit');
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

    public function downloadForm($id)
    {
        $css = 'css/main.css';
        $css_data = file_get_contents($css);

        $ContractModel = Contract::where('clinic_id', $id)->first();

        $pdf = PDF::loadView('signcontract.print_contract', compact('ContractModel', 'css_data'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('SignedContract.pdf');
    }
}
