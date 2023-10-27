<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;
use App\Clinic;
use App\FreeUser;

class StripeController extends HomeController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payWithStripe(Request $request)
    {

        $validatedData = $request->validate([
            'confirm' => 'required',
            'user_email' => 'required|email|unique:users,email',
            'user_name' => 'required',
            'email' => 'required|email|unique:clinics,email',
            'user_telephone' => 'required',
            'name' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            //'profession' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);

        $clinic = $request->all();

        $loyal_user = FreeUser::where('email', $clinic['user_email'])->get()->first();

        $clinic = json_encode($clinic);

        if (!$loyal_user)
            //return view('stripe.noregistrations')->with(['clinic' => $clinic]);
            return view('stripe.index')->with(['clinic' => $clinic]);
        else
            return view('clinics.loyal')->with(['clinic' => $clinic]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithStripe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_no'       => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear'  => 'required',
            'cvvNumber'     => 'required',
            'amount'        => 'required',
        ]);

        $registration = "paid";

        if ($request->get('amount') == 0) {
            $registration = "free";
        }

        $input =  $request->all();
        $clinic = $request->get('clinic_data');
        $oldClinicData = $clinic;
        $clinic = json_decode($clinic);
        $clinic = get_object_vars($clinic);

        if ($validator->passes()) {
            $input  = array_except($input, array('_token'));
            $input = array_except($input, array('clinic_data'));
            $stripe = Stripe::make(env("STRIPE_SECRET"));

            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number'    => $request->get('card_no'),
                        'exp_month' => $request->get('ccExpiryMonth'),
                        'exp_year'  => $request->get('ccExpiryYear'),
                        'cvc'       => $request->get('cvvNumber'),
                    ],
                ]);

                if (!isset($token['id'])) {
                    \Session::put('error', 'The Stripe Token was not generated correctly');
                    return redirect()->route('stripe.payment')->withErrors($validator)->withInput();
                }

                $charge = $stripe->charges()->create([
                    'card'        => $token['id'],
                    'currency'    => 'GBP',
                    'amount'      => 499,
                    'description' => 'Clinic Payment - ' . $clinic['name'],
                ]);

                if ($charge['status'] == 'succeeded') {
                    /**
                     * Write Here Your Database insert logic.
                     */
                    \Session::put('success', 'You have succesfully paid £' . $charge['amount'] . ' to Cosmetic Finance Group');

                    // CREATE CLINIC WITH REQUEST DATA
                    $clinic['paid'] = 1;
                    $clinic = Clinic::create($clinic);


                    return view('stripe.thanks');
                } else {
                    \Session::put('error', 'Something went wrong. Please contact us at info@cosmeticfinancegroup.co.uk');
                    return view('stripe.index')->with(['clinic' => $oldClinicData]);
                }
            } catch (Exception $e) {
                \Session::put('error', $e->getMessage());
                return view('stripe.index')->with(['clinic' => $oldClinicData]);
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                \Session::put('error', $e->getMessage());
                return view('stripe.index')->with(['clinic' => $oldClinicData]);
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                \Session::put('error', $e->getMessage());
                return view('stripe.index')->with(['clinic' => $oldClinicData]);
            }
        } else if ($registration == "free") {
            // CREATE CLINIC WITH REQUEST DATA
            $clinic['paid'] = 0;
            $clinicData = $clinic;
            $clinic = Clinic::create($clinic);
            $freeUser = FreeUser::where('email', $clinicData['user_email'])->get()->first();
            $freeUser->used = 1;
            $freeUser->save();

            return view('stripe.thanks');
        }


        \Session::put('error', 'All fields are required.');
        return redirect()->route('stripe.index')->withErrors($validator)->withInput();
    }
}
