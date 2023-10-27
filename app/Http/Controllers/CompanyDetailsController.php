<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\companyDetails;
use App\Document;
use App\Jobs\SendDocumentExpiredEmail;
use App\Jobs\SendEmail;
use App\Jobs\SendQuizEmail;
use App\Mail\ApplicationApproved;
use App\Mail\ApplicationDisApproved;
use App\Mail\ReminderMail;
use App\Message;
use App\QuizResult;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Mail;

class CompanyDetailsController extends Controller
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
        $companyDetailsmodel = companyDetails::where('clinic_id', $id)->first();

        if (Auth::user()->role == 0  && $companyDetailsmodel->is_approved == 1) {
            session()->flash('alert-danger', 'You can not update company details because of your company details already approved.');
            return redirect('clinics/' . $id . '/edit');
        }
        // if (Auth::user()->role == 0  && $companyDetailsmodel->is_save_nd_complete_later == 0) {
        //     return redirect('clinics/' . $id . '/edit');
        // }
        $link = $id;
        return view('clinics.company_details_form', compact('companyDetailsmodel', 'link'));
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

    public function downloadForm($id)
    {
        if (Auth::user()->role == 0) {
            //dd('You are not admin');
        }

        $css = 'css/main.css';
        $data_type = pathinfo($css, PATHINFO_EXTENSION);
        $css_data = file_get_contents($css);


        $companyDetailsModel = companyDetails::where('clinic_id', $id)->first();
        $ClinicModel = Clinic::where('id', $id)->first();

        //return view('clinics.company_information_print', compact('companyDetailsModel'));

        $pdf = PDF::loadView('clinics.company_information_print', compact('companyDetailsModel', 'ClinicModel', 'css_data'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download($ClinicModel->name . '.pdf');
    }

    public function approve($id, Request $request)
    {
        $companyDetailsmodel = companyDetails::where('clinic_id', $id)->first();
        if (!empty($companyDetailsmodel)) {
            $arr['is_approved'] = 1;
            $arr['is_reminder_mail_sent'] = 0;
            $arr['approval_date'] = date('Y-m-d H:i:s');
            $arr['reminder_mail_send_date'] = date("Y-m-d H:i:s", strtotime(" +339 days"));
            $companyDetailsmodel->update($arr);

            $ClinicModel = Clinic::where('id', $id)->first();
            $UserModel = User::where('clinic_id', $id)->first();
            if (!empty($ClinicModel) && !empty($UserModel)) {
                Message::create([
                    'text' => "We are happy to let you know that your application has been approved and all the details filled by you are accurate. We will reach out to you for any other queries or next steps. You may download your submitted form by logging in to your portal account.",
                    'user_id' => $UserModel->id
                ]);
                Mail::to($ClinicModel->email)->send(new ApplicationApproved($ClinicModel));
            }

            $request->session()->flash('alert-success', 'Company has been approved successfully.');
            return redirect('clinics/' . $id . '/edit');
        }
    }

    public function disApprove($id, Request $request)
    {
        $rejectionReason = $request->description;
        $companyDetailsmodel = companyDetails::where('clinic_id', $id)->first();
        if (!empty($companyDetailsmodel)) {
            $arr['is_approved'] = 2;
            $companyDetailsmodel->update($arr);

            $ClinicModel = Clinic::where('id', $id)->first();
            $UserModel = User::where('clinic_id', $id)->first();
            if (!empty($ClinicModel) && !empty($UserModel)) {
                Message::create([
                    'text' => "We are sorry but the information submitted by you in the application form has some errors. Please find the details below:<br/>" . $request->description,
                    'user_id' => $UserModel->id
                ]);
                Mail::to($ClinicModel->email)->send(new ApplicationDisApproved($ClinicModel, $rejectionReason));
            }

            $request->session()->flash('alert-success', 'Company has been dis-approved successfully.');
            return redirect('clinics/' . $id . '/edit');
        }
    }

    public function sendReminderMail()
    {
        $todayDate = date('Y-m-d');
        $companyDetailsmodel = companyDetails::where('is_approved', 1)
            ->whereDate('reminder_mail_send_date', $todayDate)
            ->get()->toArray();
        foreach ($companyDetailsmodel as $key => $value) {
            $ClinicModel = Clinic::where('id', $value['clinic_id'])->first();
            $UserModel = User::where('clinic_id', $value['clinic_id'])->first();
            if (!empty($ClinicModel) && !empty($UserModel)) {
                Message::create([
                    'text' => "A gentle reminder to fill in your onboarding form again according to the rules of filling it every 12 months. Please do that as soon as possible to avoid disconnection.",
                    'user_id' => $UserModel->id
                ]);

                $details['email'] = $ClinicModel->email;
                dispatch(new SendEmail($details));

                companyDetails::where('id', $value['id'])
                    ->limit(1)
                    ->update(array('is_reminder_mail_sent' => 1, 'is_approved' => 0));
            }
        }
    }

    public function sendDocumentExpiredMail()
    {
        $todayDate = date('Y-m-d');
        $todayDate1WeekAgo = date('Y-m-d', strtotime($todayDate . ' + 7 days'));


        $DocumentModel = Document::with('clinic')->where('is_reminder_mail_sent', 0)
            ->whereDate('expiry_date', $todayDate1WeekAgo)
            ->get()->toArray();
        foreach ($DocumentModel as $key => $value) {

            $ClinicModel = Clinic::where('id', $value['clinic_id'])->first();
            $UserModel = User::where('clinic_id', $value['clinic_id'])->first();
            if (!empty($ClinicModel) && !empty($UserModel)) {

                $details['email'] = 'info@cosmeticfinancegroup.co.uk';
                $details['clinicDetails'] = $ClinicModel;
                $details['expiryDate'] = $value['expiry_date'];
                dispatch(new SendDocumentExpiredEmail($details));

                Document::where('id', $value['id'])
                    ->limit(1)
                    ->update(array('is_reminder_mail_sent' => 1));
            }
        }
    }

    public function updateClinicApprovedStatus()
    {
        $todayDate = date('Y-m-d');
        $DocumentModel = Document::with('clinic')->whereDate('expiry_date', '<', $todayDate)
            ->get()->toArray();
        foreach ($DocumentModel as $key => $value) {

            $ClinicModel = Clinic::where('id', $value['clinic_id'])->first();
            $UserModel = User::where('clinic_id', $value['clinic_id'])->first();
            if (!empty($ClinicModel)) {

                Clinic::where('id', $value['clinic_id'])
                    ->limit(1)
                    ->update(array('approved' => 0));
            }
        }
    }

    public function sendQuizRedoReminderMain()
    {
        $todayDate = date('Y-m-d');
        $QuizResult = QuizResult::whereDate('reminder_mail_send_date', '<=' ,$todayDate)
            ->get()->toArray();
        foreach ($QuizResult as $key => $value) {

            $ClinicModel = Clinic::where('id', $value['clinic_id'])->first();
            $UserModel = User::where('clinic_id', $value['clinic_id'])->first();
            if (!empty($ClinicModel) && !empty($UserModel)) {
                Message::create([
                    'text' => "Time to refresh your knowledge! You must successfully complete your annual refresher test in order to remain an introducer of Cosmetic Finance Group. Please click here to continue.",
                    'user_id' => $UserModel->id
                ]);

                $details['email'] = $ClinicModel->email;
                dispatch(new SendQuizEmail($details));

                QuizResult::where('id', $value['id'])->delete();
            }
        }
    }
}
