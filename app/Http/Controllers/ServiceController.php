<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\BuyingOption;
use App\Category;
use App\Clinic;
use App\Message;
use Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        # Validate request
        $validator = Validator::make($request->all(), [
            'description'       => 'required'
        ]);

        if(!$validator->passes()){
            $clinic = Clinic::find($request->get('clinic_id'))->toArray();
            return redirect("/clinics/" . $request->get('clinic_id') . "/edit")->withErrors($validator)->withInput($clinic);
        }

        # Create buying options
        $buyingOptions = $request->get('buyingoptions');

        if($buyingOptions[1]['name'] == null){
            $validator = Validator::make($request->all(), [
                'price'       => 'required'
            ]);

            if(!$validator->passes()){
                $clinic = Clinic::find($request->get('clinic_id'))->toArray();
                return redirect("/clinics/" . $request->get('clinic_id') . "/edit")->withErrors($validator)->withInput($clinic);
            }
        }

        # Create Service
        if(!$request->get('name')){
            $serviceName = Category::where('id', $request->get('category_id'))->first()->name;

            $service = Service::create([
                "name" => $serviceName,
                "description" => $request->get('description'),
                "price" => $request->get('price'),
                "category_id" => $request->get('category_id'),
                "clinic_id" => $request->get('clinic_id')
            ]);

            $clinic = Clinic::find($request->get('clinic_id'))->first();


            Message::create([
                'text' => $clinic->name . " has added a new service called <strong>" . $serviceName . "</strong> to <strong>" . $serviceName . "</strong>",
                'user_id' => 1,
                'read' => 0
            ]);
        }else{
            $service = Service::create($request->all());
            $clinic = Clinic::where('id', $request->get('clinic_id'))->get()->first();
            $category = Category::where('id', $request->get('category_id'))->first()->name;

            Message::create([
                'text' => $clinic->name . " has added a new service called <strong>" . $service->name . "</strong> to <strong>" . $category . "</strong>",
                'user_id' => 1,
                'read' => 0
            ]);
        }


        if($buyingOptions[1]['name'] != null){
            foreach($buyingOptions as $buyingOption){
                if($buyingOption['price'] == ''){
                    $validator = Validator::make($buyingOption, [
                        'price'       => 'required'
                    ]);

                    if(!$validator->passes()){
                        $clinic = Clinic::find($request->get('clinic_id'))->toArray();
                        return redirect("/clinics/" . $request->get('clinic_id') . "/edit")->withErrors($validator)->withInput($clinic);
                    }
                }

                $newBuyingOption = new BuyingOption;

                $newBuyingOption->name = $buyingOption['name'];
                $newBuyingOption->price = $buyingOption['price'];
                $newBuyingOption->service_id = $service->id;
                $newBuyingOption->save();
            }
        }

        return redirect()->back();
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
        //
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

        $service = Service::find($id);

        if($request->get('service_approved')){
            $service->approved = $request->get('service_approved');
        }

        if($request->get('name') && $request->get('description')){
            $service->name = $request->get('name');
            $service->description = $request->get('description');
        }

        if($request->get('price')){
            $service->price = $request->get('price');
        }

        $service->save();

        // Implement return message

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::Find($id);
        $service->delete();

        return redirect()->back();
    }
}
