<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Clinic;
use App\Service;
use App\Category;
use App\ClinicSignupWaitList;
use App\companyDetails;
use App\Document;
use App\Mail\ClinicSignUpWaitingList;
use App\Message;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Mail\ContactClinic;
use App\Mail\NotifyClient;
use App\QuizResult;
use App\Template;
use App\User;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reset_hash()
    {
        echo Hash::make($_REQUEST['password']);
        exit;
    }

    public function index()
    {
        /*   $password = Hash::make('james.brandwood');
var_dump($password);exit;
*/

        // Fetch all clinics
        $data = [
            'clinics' => Clinic::orderBy('name', 'asc')->get(),
            'search' => 0,
            'term' => '',
            'postcode' => 0,
            'within' => 0
        ];

        return view('clinics.index')->with($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clinic = Clinic::find($id);

        $data = [
            'clinic' => $clinic,
            'categories' => Category::where('approved', 1)->pluck('name', 'id'),
            'services' => $this->sortServicesByCategory($clinic)
        ];

        return view('clinics.single')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $clinic = Clinic::find($id);


        $Templates = Category::has('template')->with('template')->get()->toArray();

        $QuizResult = QuizResult::where('clinic_id', $id)->first();



        $data = [
            'Templates' => $Templates,
            'clinic' => $clinic,
            'QuizResult' => $QuizResult,
            'categories' => Category::where('approved', 1)->pluck('name', 'id'),
            'services' => $this->sortServicesByCategory($clinic)
        ];

        return view('clinics.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Save clinic initially
        $clinic = Clinic::find($id);
        $clinic->update($request->all());

        // If image is present, save it and update it in the database table
        if ($request->file('clinic_logo')) {
            $file = $request->file('clinic_logo');
            $fileExtension = $file->getClientOriginalExtension();
            $filePath = '/img/profile_images/' . $clinic->id . "." . $fileExtension;

            // Save Image
            $file->move(
                base_path() . '/public/img/profile_images/',
                $clinic->id . "." . $fileExtension
            );

            // Update database table
            $clinic->logo = $filePath;
            $clinic->save();
        }

        if ($request->ajax()) {
            Message::create([
                'text' => $clinic->name . " has updated their profile information.",
                'user_id' => 1,
                'read' => 0
            ]);

            return json_encode($request->all());
        }

        $request->session()->flash('alert-success', 'Clinic has been successfully edited.');

        return redirect("clinics/{$clinic->id}/edit")->with('clinic', $clinic);
    }

    function additional($id)
    {
        $clinic = Clinic::find($id);

        return view("clinics.edit.additional")->with("clinic", $clinic);
    }

    /**
     * Approve or revoke approval for specific categories. Should only be called from the super-admin dashboard
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Request $request)
    {
        $clinic = Clinic::where('id', $request->get('clinic_id'))->first();

        if ($clinic) {
            $clinic->approved = $request->get('approved');
            $clinic->paylater_id = $request->get('paylater_id');
            $clinic->save();
        }

        return redirect()->back();
    }

    public function url(Request $request)
    {
        $clinic = Clinic::where('id', $request->get('clinic_id'))->first();

        if ($clinic) {
            $clinic->url = $request->get('url');
            $clinic->save();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function sortServicesByCategory($clinic)
    {
        $services = $clinic->services;
        $sortedServices = [];

        foreach ($services as $service) {
            $sortedServices[$service->category->name][] = $service;
        }


        return $sortedServices;
    }

    public function getOrders($id)
    {
        $clinic = Clinic::where('id', $id)->first();

        return view('clinics.orders')->with('clinic', $clinic);
    }

    public function search(Request $request)
    {
        $term = $request->get('term');
        $postcode = $request->get('postcode');

        if ($term) {
            $data = [
                'clinics' => Clinic::where('name', 'like', '%' . $term . '%')->get(),
                'search' => 1,
                'term' => $request->get('term'),
                'postcode' => '',
                'within' => $request->get('within'),
            ];
        } else if ($postcode) {
            $data = [
                'clinics' => Clinic::where('postcode', 'like', '%' . $postcode . '%')->get(),
                'search' => 1,
                'term' => '',
                'postcode' => $request->get('postcode'),
                'within' => $request->get('within'),
            ];
        } else {
            $data = [
                'clinics' => Clinic::all(),
                'search' => 1,
                'term' => '',
                'postcode' => '',
                'within' => $request->get('within'),
            ];
        }

        return view('clinics.index')->with($data);
    }

    public function viewClinicOrders($id)
    {
    }

    public function viewSingleOrder($id)
    {
    }

    public function thanks()
    {
    }

    public function visible(Request $request)
    {
        $clinic = Clinic::find($request->get('clinic_id'));

        if ($clinic) {
            $clinic->visible = $request->get('visible');
            $clinic->save();
        }

        return redirect()->back();
    }

    public function request()
    {
        return view('clinics.requestform_new');
    }

    public function companyDetailsDirect()
    {
        $link = '';
        $companyDetailsmodel  = [];
        return view('clinics.company_details_form', compact('link', 'companyDetailsmodel'));
    }

    public function companyDetails($link)
    {
        $clinicModel = Clinic::where('merchant_ref', $link)->first();
        if (empty($clinicModel)) {
            die();
        }
        $companyDetailsmodel  = [];
        $isSignup = 1;
        return view('clinics.company_details_form', compact('link', 'companyDetailsmodel', 'isSignup'));
    }

    public function storeCompanyDetails($link, Request $request)
    {
        $input = $request->all();

        if (isset($request->saveandcompletelater)) {
            $input['is_save_nd_complete_later'] = 1;
        } else {
            $input['is_save_nd_complete_later'] = 0;
        }

        $clinicModel = Clinic::where('merchant_ref', $link)->first();
        if (!empty($clinicModel)) {
            $input['orderID'] = $link;
            $input['clinic_id'] = $clinicModel->id;

            $UserModel = User::where('email', $clinicModel->email)->first();
            if (!empty($UserModel)) {
                $input['user_id'] = $UserModel->id;
            }
            $isRedirectToThankyou = 1;
        } else {
            $clinicModel = Clinic::where('id', $link)->first();
            $input['clinic_id'] = $clinicModel->id ?? '';
            if (!empty($clinicModel) && Auth::user()->role == 1) {
                //$input['orderID'] = $link;
                $UserModel = User::where('email', $clinicModel->email)->first();
                if (!empty($UserModel)) {
                    $input['user_id'] = $UserModel->id;
                }
            } else {
                $input['user_id'] = Auth::user()->id;
            }
            $isRedirectToThankyou = 0;
        }

        if (isset($request['signature']) && !empty($request['signature']) && !is_null($request['signature'])) {

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



        if ($request->hasFile('id_proof') && $request->file('id_proof')->isValid()) {
            $id_proof = time() . str_random(5) . '.' . $request->id_proof->extension();
            $request->id_proof->move(public_path('uploads'), $id_proof);
            $input['id_proof'] = $id_proof;
        }

        if ($request->hasFile('address_proff') && $request->file('address_proff')->isValid()) {
            $address_proff = time() . str_random(5) . '.' . $request->address_proff->extension();
            $request->address_proff->move(public_path('uploads'), $address_proff);
            $input['address_proff'] = $address_proff;
        }

        if ($request->hasFile('bank_account_proof') && $request->file('bank_account_proof')->isValid()) {
            $bank_account_proof = time() . str_random(5) . '.' . $request->bank_account_proof->extension();
            $request->bank_account_proof->move(public_path('uploads'), $bank_account_proof);
            $input['bank_account_proof'] = $bank_account_proof;
        }

        if ($request->hasFile('photo_of_working_space') && $request->file('photo_of_working_space')->isValid()) {
            $photo_of_working_space = time() . str_random(5) . '.' . $request->photo_of_working_space->extension();
            $request->photo_of_working_space->move(public_path('uploads'), $photo_of_working_space);
            $input['photo_of_working_space'] = $photo_of_working_space;
        }

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $logo = time() . str_random(5) . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads'), $logo);
            $input['logo'] = $logo;
        }

        if ($request->file('path')) {
            $file = $request->file('path');
            $fileName = time() . '_' . $request->path->getClientOriginalName();
            $filePath = '/img/Documents/' . $fileName;

            // Save Image
            $file->move(
                base_path() . '/public/img/Documents/' . $fileName
            );

            Document::create([
                "path" => $filePath,
                "clinic_id" => $clinicModel->id,
                'type' => 'proof'
            ]);
        }

        $companyDetailsmodel = companyDetails::where('clinic_id', $input['clinic_id'])->first();
        if (empty($companyDetailsmodel)) {

            Message::create([
                'text' => "Company Details Form has been filled by this clinic <strong>" . $clinicModel->name . "</strong>",
                'user_id' => 0
            ]);
            Mail::to("info@cosmeticfinancegroup.co.uk")
            ->cc(['admin@cosmeticfinancegroup.co.uk'])
            ->send(new NotifyClient($clinicModel));

            $input['is_approved'] = 0;
            companyDetails::create($input);
        } else {
            if (Auth::user()->role == 0  && $companyDetailsmodel->is_approved == 1) {
                $request->session()->flash('alert-danger', 'You can not update company details because of your company details already approved.');
                return redirect('clinics/' . $link . '/edit');
            }
            //if ($companyDetailsmodel->is_save_nd_complete_later == 1 && $input['is_save_nd_complete_later'] == 0) {
            Message::create([
                'text' => "Company Details Form has been filled by this clinic <strong>" . $clinicModel->name . "</strong>",
                'user_id' => 0
            ]);
            Mail::to("info@cosmeticfinancegroup.co.uk")
            ->cc(['admin@cosmeticfinancegroup.co.uk'])
            ->send(new NotifyClient($clinicModel));
            // }
            if ($companyDetailsmodel->is_approved == 2) {
                $input['is_approved'] = 0;
            }

            if (is_null($request['signature'])) {
                $input['signature'] = $companyDetailsmodel->signature;
            }
            $companyDetailsmodel->update($input);
        }


        if ($isRedirectToThankyou == 1) {
            return redirect()->route('paypal.thanks')->with('message', 'Thank you!!!');
        } else {
            $request->session()->flash('alert-success', 'Company Details has been successfully added.');
            return redirect('clinics/' . $link . '/edit');
            //return redirect()->route('admin')->with('message', 'Thank you!!!');
        }
        ##
    }

    public function companyDetailsAdmin($id)
    {
        $clinicModel = Clinic::where('id', $id)->first();
        if (!empty($clinicModel)) {
            //$UserModel = User::where('email', $clinicModel->email)->first();
            //if (!empty($UserModel)) {
            $companyDetailsModel = companyDetails::where('clinic_id', $clinicModel->id)->first();
            if (!empty($companyDetailsModel)) {
                return view('clinics.company_information', compact('companyDetailsModel'));
            }
            // }
        }

        $link = $id;
        $companyDetailsmodel  = [];
        return view('clinics.company_details_form', compact('link', 'companyDetailsmodel'));
    }

    public function saveRequest(Request $request)
    {
        #
    }

    public function notifications($id)
    {
        $clinic = Clinic::find($id);
        $notifications = $clinic->notifications;

        return view('clinics.notifications')->with(['notifications' => $notifications]);
    }

    public function showDocuments($id)
    {
        $clinic = Clinic::find($id);

        return view('clinics.documents')->with(['clinic' => $clinic]);
    }

    public function storeWaitList(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'business_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $ClinicSignupWaitListModel = ClinicSignupWaitList::create($input);

        // If image is present, save it and update it in the database table
        if ($request->file('path')) {
            $file = $request->file('path');
            $fileExtension = $file->getClientOriginalExtension();
            $filePath = '/documents/' . $ClinicSignupWaitListModel->id . "." . $fileExtension;

            // Save Image
            $file->move(
                base_path() . '/public/documents/',
                $ClinicSignupWaitListModel->id . "." . $fileExtension
            );

            // Update database table
            $ClinicSignupWaitListModel->path = $filePath;
            $ClinicSignupWaitListModel->save();
        }

        Message::create([
            'text' => "CLINIC SIGN UP Form has been filled by this user <strong>" . $input['name'] . "</strong>",
            'user_id' => 0
        ]);
        Mail::to("info@cosmeticfinancegroup.co.uk")->send(new ClinicSignUpWaitingList($input['name']));

        $request->session()->flash('alert-success', 'Thank you for signing up. we will contact you soon.');
        return redirect('clinics/request');
    }

    public function reviewedInformation(Request $request, $id)
    {
        $request->validate([
            'is_reviewed_information' => 'required',
        ]);

        $clinic = Clinic::find($id);
        $clinic->update($request->all());

        $request->session()->flash('alert-success', 'Clinic has been successfully edited.');
        return redirect("clinics/{$clinic->id}/edit")->with('clinic', $clinic);
    }
}
