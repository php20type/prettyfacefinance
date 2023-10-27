<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;
use App\Mail\LoanApproved;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use App\Order;
use App\User;

class GainCreditController extends Controller
{

    // Step 1 - loan amount

    public function loan_products($loan_amount)
    {

        $url = "https://api-preprod.globalanalytics.in/pos/sandbox/loan_products?loan_amount=".$loan_amount;
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Request headers
        $headers = array(
            'Cache-Control: no-cache',
            'Subscription-Key: dbe9b346b0dc4464904b48bbb03a187b',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $resp = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($resp, true);
            
        return response()->json($data);

    }

    // Step 2 - Soft Check

    public function applications(Request $request)
    {

        # get order id from session
        $order_id = session('order_id');
        
        # Create customer if email address not found
        $user = User::where('email', $request->email)->first();

        if(!$user){
            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => bcrypt('aoegboripogqe9geqg'),
                'telephone' => $request->mobile_phone,
                'telephone_secondary' => $request->mobile_phone,
                'address1' => $request->building_info.' '.$request->street,
                'city' => $request->city,
                'postcode' => $request->post_code,
                'in_arrears' => 0,
                'role' => 0,
                'paylater_id' => '0',
                'clinic_id' => 0
            ]);
        }

        # Attach customer to order
        $order = Order::where('id', $order_id)->first();
        $order->user_id = $user->id;
        $order->save();

        $url = "https://api-preprod.globalanalytics.in/pos/sandbox/applications";
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Request headers
        $headers = array(
            'Content-Type: application/json',
            'Cache-Control: no-cache',
            'Subscription-Key: dbe9b346b0dc4464904b48bbb03a187b',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        # Request body
        $request_body = '{
            "loan_amount": '.$request->loan_amount.',
            "loan_term_months": '.$request->loan_term_months.',
            "title": "'.$request->title.'",
            "first_name": "'.$request->first_name.'",
            "last_name": "'.$request->last_name.'",
            "dob_day": '.$request->dob_day.',
            "dob_month": '.$request->dob_month.',
            "dob_year": '.$request->dob_year.',
            "email": "'.$request->email.'",
            "mobile_phone": "'.$request->mobile_phone.'",
            "post_code": "'.$request->post_code.'",
            "building_info": "'.$request->building_info.'",
            "street": "'.$request->street.'",
            "city": "'.$request->city.'",
            "employment_type": "'.$request->employment_type.'",
            "monthly_income": '.$request->monthly_income.',
            "monthly_expenses": '.$request->monthly_expenses.',
            "no_of_dependents": '.$request->no_of_dependents.'
        }';
        
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);

        $resp = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($resp, true);

        # if application is declined, set status to DECLINED
        if(isset($data["status"]) && $data["status"]!=="SOFT_APPROVED") {
            $order = Order::where('id', $order_id)->first();
            $order->status = 'DECLINED';
            $order->save();
        }

        # if application is accepted, set status to cart
        if(isset($data["status"]) && $data["status"]==="SOFT_APPROVED") {
            $order = Order::where('id', $order_id)->first();
            $order->status = 'Cart';
            $order->save();
        }

        return response()->json($data);

    }

    // Step 3 - Hard Check

    public function applicationsHard(Request $request)
    {

        # get order id from session
        $order_id = session('order_id');

        $url = "https://api-preprod.globalanalytics.in/pos/sandbox/applications/".$request->application_ref."/hard";
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Request headers
        $headers = array(
            'Content-Type: application/json',
            'Cache-Control: no-cache',
            'Subscription-Key: dbe9b346b0dc4464904b48bbb03a187b',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        # Request body
        $request_body = '{
            "agree_credit_check": '.$request->agree_credit_check.',
            "bank_account_number": "'.$request->bank_account_number.'",
            "bank_sort_code": "'.$request->bank_sort_code.'",
            "debit_card_type": "'.$request->debit_card_type.'"
        }';
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);

        $resp = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($resp, true);

        # if application is declined, set status to DECLINED
        if(isset($data["status"]) && $data["status"]!=="HARD_APPROVED") {
            $order = Order::where('id', $order_id)->first();
            $order->status = 'DECLINED';
            $order->save();
        }

        # if application is accepted, set status to cart
        if(isset($data["status"]) && $data["status"]==="HARD_APPROVED") {
            $order = Order::where('id', $order_id)->first();
            $order->status = 'Cart';
            $order->save();
        }
            
        return response()->json($data);

    }

    // Step 4 - Card Submitted

    public function cardSubmitted(Request $request)
    {

        # get order id from session
        $order_id = session('order_id');

        $url = "https://api-preprod.globalanalytics.in/pos/sandbox/applications/".$request->application_ref."/card";
        $curl = curl_init($url);
        
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        # Request headers
        $headers = array(
            'Content-Type: application/json',
            'Cache-Control: no-cache',
            'Subscription-Key: dbe9b346b0dc4464904b48bbb03a187b',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
        # Request body
        $request_body = '{
            "card_captured": '.$request->card_captured.',
            "card_ref": "'.$request->card_ref.'"
        }';

        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);
        
        $resp = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($resp, true);

        # if application is declined, set status to DECLINED
        if(isset($data["status"]) && $data["status"]!=="CARD_SUBMITTED") {
            $order = Order::where('id', $order_id)->first();
            $order->status = 'DECLINED';
            $order->save();
        }

        # if application is accepted, set status to cart
        if(isset($data["status"]) && $data["status"]==="CARD_SUBMITTED") {
            $order = Order::where('id', $order_id)->first();
            $order->status = 'Cart';
            $order->save();
        }
            
        return response()->json($data);

    }

    // Step 5 - Loan explanation accepted

    public function loanexplanationaccepted(Request $request)
    {

        # get order id from session
        $order_id = session('order_id');

        $url = "https://api-preprod.globalanalytics.in/pos/sandbox/applications/".$request->application_ref."/secci";
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Request headers
        $headers = array(
            'Content-Type: application/json',
            'Cache-Control: no-cache',
            'Subscription-Key: dbe9b346b0dc4464904b48bbb03a187b',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        # Request body
        $request_body = '{
            "agree_precontract": '.$request->agree_precontract.'
        }';
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);

        $resp = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($resp, true);

        # if application is declined, set status to DECLINED
        if(isset($data["status"]) && $data["status"]!=="CONTRACT_AGREED") {
            $order = Order::where('id', $order_id)->first();
            $order->status = 'DECLINED';
            $order->save();
        }

        # if application is accepted, set status to cart
        if(isset($data["status"]) && $data["status"]==="CONTRACT_AGREED") {
            $order = Order::where('id', $order_id)->first();
            $order->status = 'Cart';
            $order->save();
        }
        
        
            
        return response()->json($data);

    }

    // Step 6 - ESign stage

    public function eSignRequest(Request $request)
    {

        # get order id from session
        $order_id = session('order_id');

        $url = "https://api-preprod.globalanalytics.in/pos/sandbox/applications/".$request->application_ref."/esign";
        $curl = curl_init($url);
        
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        # Request headers
        $headers = array(
            'Content-Type: application/json',
            'Cache-Control: no-cache',
            'Subscription-Key: dbe9b346b0dc4464904b48bbb03a187b',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
        # Request body
        $request_body = '{
            "agree_esign": '.$request->agree_esign.',
            "signature": "'.$request->signature.'"
        }';
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);
        
        $resp = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($resp, true);

        if(isset($data["status"]) && $data["status"]==="LOAN_APPROVED") {

            # send email to customer
            Mail::to($request->email)
                ->send(new LoanApproved($request));

            # update order status to ACCEPTED
            $order = Order::where('id', $order_id)->first();
            $order->status = 'ACCEPTED';
            $order->save();

            # remove from cart
            Cart::destroy();

        }

        # if application is declined, set status to DECLINED
        if(isset($data["status"]) && $data["status"]!=="LOAN_APPROVED") {
            $order = Order::where('id', $order_id)->first();
            $order->status = 'DECLINED';
            $order->save();
        }
        
            
        return response()->json($data);

    }

    // Step 7 - Payout funds

    public function payoutrequest(Request $request)
    {

        $url = "https://api-preprod.globalanalytics.in/pos/sandbox/applications/".$request->application_ref."/payout";
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Request headers
        $headers = array(
            'Cache-Control: no-cache',
            'Subscription-Key: dbe9b346b0dc4464904b48bbb03a187b',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $resp = curl_exec($curl);
        curl_close($curl);
        var_dump($resp);

        $data = json_decode($resp, true);
            
        return response()->json($data);

    }

    public function checkcartstatuses() {

        // find all cart statuses from orders older than 2 minutes and change them to abandoned

        $orders = Order::where('status', 'Cart')
            ->where('created_at', '<', Carbon::now()->subHours(6))
            ->where('created_at', '>', '2022-04-26 00:00:00')
            ->get();

        foreach($orders as $order) {
            $order->status = 'Abandoned';
            $order->save();
        }

    }

}