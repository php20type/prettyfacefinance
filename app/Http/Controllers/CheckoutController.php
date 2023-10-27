<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Order;
use App\OrderItems;
use App\User;
use App\Clinic;

Class CheckoutController extends Controller
{

    public function index()
    {
        # Get basket items
        $basketItems = Cart::content();

        if(Cart::count() < 1){
            return redirect('/basket');
        }

        $i=0;
        $multipleclinics = false;
        $firstclinic = null;

        # Check if order has more than one clinic
        foreach ($basketItems as $item) {
            if($i==0) {
                $firstclinic = $item->options->clinic;
            }
            if($item->options->clinic != $firstclinic) {
                $multipleclinics = true;
            }
            $i++;
        }
        
        if($multipleclinics==true) {
            return view('checkout.multipleclinics');
        }

        # Get clinic url
        $clinic = Clinic::find($firstclinic);

        # Get clinic url
        $clinicurl = $clinic->url;

        # if no url exists
        if($clinicurl == null) {
            return view('checkout.nourl');
        }

        # redirect to url
        return redirect($clinicurl);

        # Create a new order
        /*$total     = Cart::subtotal();
        $itemCount = count($basketItems);
        $total = str_replace(',', '', $total);

        $order = Order::create([
            "total"      => (float)$total,
            "item_count" => $itemCount,
            "status" => "Cart",
            "clinic_id" => 0
        ]);

        # Attach all items to the order. This order may be abandoned
        # before customer even starts the payl8r flow. Consider this.
        #
        # Will always only assign one clinic (last) to an order. May pose
        # problems in the future if a customer ever orders from multiple
        # clinics simultaneously
        foreach ($basketItems as $item) {
            $order->orderItems()->create([
                "product_id" => $item->id,
                "price" => $item->price,
                "quantity" => $item->qty,
                "option" => $item->options->option,
                "clinic_id" => $item->options->clinic,
                "order_id" => $order->id
            ]);

            $order->update(['clinic_id' => $item->options->clinic]);
        }

        # Store order data to send to checkout
        $data = [
            "order" => $order
        ];

        # Store order ID to session
        session(['order_id' => $order->id]);

        # Get Clinic from ID

        $data["clinic"] = Clinic::find($item->options->clinic);

        # Get loan products for checkout

        $url = "https://api-preprod.globalanalytics.in/pos/sandbox/loan_products?loan_amount=".$total;
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Request headers
        $headers = array(
            'Cache-Control: no-cache',
            'Subscription-Key: dbe9b346b0dc4464904b48bbb03a187b',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $loan_products = curl_exec($curl);
        curl_close($curl);

        $data["loan_products"] = json_decode($loan_products);

        # Remove order from basket
        //Cart::destroy();

        # Return view with data
        return view('checkout.index')
            ->with($data);*/

    }

    public function complete(){
        if (isset($_POST['response'])) {
            if ($encrypted_response = base64_decode($_POST['response'])) {
                $key = file_get_contents('keys/4');

                try{
                    if(openssl_public_decrypt($encrypted_response, $decrypted, $key)){
                        $json_decoded = json_decode($decrypted);

                        $returnData = $json_decoded->return_data;
                        $customerData = $returnData->customer_data;
                        $orderId = $returnData->order_id;

                        $user = User::where('email', $customerData->email)->first();

                        if(!$user){
                            $user = User::create([
                                'name' => $customerData->firstnames . ' ' . $customerData->surname,
                                'email' => $customerData->email,
                                'password' => bcrypt('aoegboripogqe9geqg'),
                                'telephone' => $customerData->phone,
                                'telephone_secondary' => $customerData->phone,
                                'address1' => $customerData->address,
                                'city' => $customerData->city,
                                'postcode' => $customerData->postcode,
                                'in_arrears' => 0,
                                'role' => 0,
                                'paylater_id' => '0',
                                'clinic_id' => 0
                            ]);
                        }


                        $order = Order::where('id', $orderId)->first();
                        $order->status = $returnData->status;

                        if(isset($returnData->reason)){
                            $order->reason = $returnData->reason;
                        }

                        $order->user_id = $user->id;
                        $order->save();
                    }else{
                        file_put_contents("response.txt", "Unable to decrypt");
                    }
                }catch(Exception $e){
                    file_put_contents("response.txt", "Unable to decrypt");
                }
            }else{
                file_put_contents("response.txt", "Unable to base64 decode");
            }
        }else{
            file_put_contents("response.txt", "No Response");
        }
    }

    public function thanks(){
        $content = $_POST;

        return view("checkout.thanks")->with(["content" => $content]);
    }
}