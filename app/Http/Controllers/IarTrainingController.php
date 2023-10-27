<?php
namespace App\Http\Controllers;

use App\Clinic;
use App\Mail\ExamPassed;
use App\Question;
use App\QuestionAnswer;
use App\QuizResult;
use App\QuizReviewedInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IarTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $QuizReviewedInfo = QuizReviewedInfo::where('clinic_id',$id)->first();
        // if(!empty($QuizReviewedInfo))
        // {
        //     return redirect()->route('iartraining.takequiz',['id' => $id]);
        // }
        return view('IarTraining.index',compact('QuizReviewedInfo'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function takeQuiz()
    {
        $QuestionModel = Question::with('option')->orderBy('question', 'asc')->get()->toArray();
        return view('IarTraining.quiz-form',compact('QuestionModel'));
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
        $clinic_id = ($request->clinic_id);
        $input = $request->except(['_token','send','clinic_id']);

        $score = 0;
        foreach($input as $k=>$v)
        {   
            $QuestionAnswer =  QuestionAnswer::where('qid',$k)->pluck('option_number')->first();
            if($QuestionAnswer == $v) {
                $score++;
            }
        }
        if(isset($input['choice']) && in_array(1, $input['choice']) && in_array(4, $input['choice']) && in_array(5, $input['choice']))
        {
            $score++;
        }
        

        if($score==6)
        {
            $request->session()->flash('alert-success', 'Congratulations. You have successfully answered all questions. You may now become an introducer of Cosmetic Finance Group.');
            return redirect()->route('iartraining.thankyou',['id' => $clinic_id]);
        }else{
            $request->session()->flash('alert-danger', 'We are sorry.. you have failed to correctly answer the required questions. You must successfully pass this test in order to become an introducer of Cosmetic Finance Group. Please try again.');
            return redirect()->route('clinics.edit',['id' => $clinic_id]);
            //return redirect()->back();
        }
    }

    public function sendNotification(Request $request)
    {
        $clinic_id = ($request->clinic_id);

        QuizResult::create([
            "clinic_id" => $clinic_id,
            "reminder_mail_send_date" => date("Y-m-d H:i:s", strtotime(" +339 days"))
        ]);

        $clinicModel = Clinic::where('id', $clinic_id)->first();

        Mail::to($clinicModel->email)
         ->send(new ExamPassed($clinicModel));

        $request->session()->flash('alert-success', 'Congratulations. You have successfully answered all questions. You may now become an introducer of Cosmetic Finance Group.');
        return redirect()->route('clinics.edit',['id' => $clinic_id]);
    }

    public function confirmReviewedInfo(Request $request)
    {
        $request->validate([
            'clinic_id' => 'required',
            'signature' => 'required',
            'is_reviewed_information' => 'required',
        ]);

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

        $clinic_id = ($request->clinic_id);

        QuizReviewedInfo::create([
            "clinic_id" => $request->clinic_id,
            "is_reviewed_information" => 1,
            "signature" => $input['signature']
        ]);

        $request->session()->flash('alert-success', 'You have watched a video.');
        return redirect()->route('iartraining.takequiz',['id' => $request->clinic_id]);
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thankYou()
    {
        return view('IarTraining.thank-you');
    }
   
}
