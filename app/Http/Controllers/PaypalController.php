<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Document;
use App\FreeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/

use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Illuminate\Support\Facades\Log;

class PaypalController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(
            new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret']
            )
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function index()
    {
        return view('paypal.paywithpaypal');
    }

    public function payWithpaypal(Request $request)
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
            'password_confirmation' => 'required',
        ]);

        // If image is present, save it and update it in the database table
        // if ($request->file('path')) {
        //     $file = $request->file('path');
        //     $fileName = time() . '_' . $request->path->getClientOriginalName();
        //     $filePath = '/img/Documents/' . $fileName;

        //     // Save Image
        //     $file->move(
        //         base_path() . '/public/img/Documents/' . $fileName
        //     );
        //     $request['file_path'] = $filePath;
        // }


        $clinic = $request->all();

        $loyal_user = FreeUser::where('email', $clinic['user_email'])->get()->first();

        $clinic = json_encode($clinic);

        if (!$loyal_user) {
            return view('paypal.index')->with(['clinic' => $clinic]);
        } else {
            return view('clinics.loyal')->with(['clinic' => $clinic]);
        }
    }

    public function payWithpaypalBackup(Request $request)
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
            'password_confirmation' => 'required',
        ]);

        $clinic = $request->all();
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item-Clinic Payment - ' . $clinic['name'])
            /** item name **/
            //$request->get('paymentoption')
            ->setCurrency('GBP')
            ->setQuantity(1)
            ->setPrice(1);
        /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('GBP')
            ->setTotal(1);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status'))
            /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Log::info('This is some useful information start.');
        Session::put('paypal_payment_id', $payment->getId());
        Log::info($payment->getId());
        Log::info(Session::get('paypal_payment_id'));

        $clinic = $request->all();
        Session::put($payment->getId(), $clinic);
        //$clinic = json_encode($clinic);
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');
    }
    public function getPaymentStatus(Request $request)
    {
        Log::info('This is some useful information.');
        /** Get the payment ID before session clear **/


        $payment_id = Session::get('paypal_payment_id');
        $payment_id = $payment_id ? $payment_id : $request->get('paymentId');
        Log::info(print_r($payment_id, true));
        Log::info('This is some useful information1.');
        $clinic = Session::get($payment_id);
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        Session::forget($payment_id);

        Log::info(print_r($clinic, true));

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            return Redirect::to('/clinics/request');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        Log::info($result->getState());
        if ($result->getState() == 'approved') {

            /* Save order in database */
            // CREATE CLINIC WITH REQUEST DATA
            if (isset($clinic['email'])) {


                $clinic['paid'] = 1;
                $clinic = Clinic::create($clinic);

                \Session::put('success', 'Payment success');
                return view('stripe.thanks');
            }
            //return Redirect::to('/');
        }
        \Session::put('error', 'Payment failed');
        return Redirect::to('/clinics/request');
    }

    public function paymentSuccess(Request $request)
    {
        $clinic = $request->get('clinic_data');
        $clinic = json_decode($clinic);
        $clinic = get_object_vars($clinic);

        $clinic['paid'] = 1;
        $clinic['merchant_ref'] = $request->orderID;
        $ClinicModel = Clinic::create($clinic);

        // Document::create([
        //     "path" => $clinic['file_path'],
        //     "clinic_id" => $ClinicModel->id,
        //     'type' => 'proof'
        // ]);

        return '1';
    }
}
