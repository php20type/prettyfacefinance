<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Service;
use App\BuyingOption;

class BasketController extends Controller
{
    public function index(){
        return view ('checkout.basket.index');
    }

    public function add(Request $request){
        // Cart::add(['id' => '293ad2', 'name' => 'Product 2', 'qty' => 1, 'price' => 9.99, 'options' => ['size' => 'small']]);
        $productId = $request->get('id');
        $optionId = $request->get('buyingOptions');
        $quantity = $request->get('quantity');
        $buyingOption = BuyingOption::where('id', $optionId)->get()->first();

        $product = Service::where('id', $productId)->get()->first();
        $productName = $product->name;
        $productPrice = $product->price;

        if($buyingOption){
            $productPrice = $buyingOption->price;
        }

        $cart = Cart::add([
            'id' => $productId,
            'name' => $productName,
            'qty' => $quantity,
            'price' => $productPrice,
            'options' => [
                'option' => ($buyingOption) ? $buyingOption->name : '',
                'clinic' => $request->get('clinic')
            ]
        ]);

        if($cart){
            return redirect('/basket');
        }else{
            return redirect('/');
        }
    }

    public function update(Request $request){
        Cart::update($request->get('rowid'), $request->get('qty'));

        return redirect('/basket');
    }

    public function remove(Request $request){
        Cart::remove($request->get('rowid'));

        return redirect('/basket');
    }

    public function destroy(){
        Cart::destroy();

        return view ('checkout.basket.index');
    }
}
