<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Model\Product;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Cart::count() != 0) {
            return view('user.pre-checkout');
        } else {
            return redirect()->route('cart');
        }
    }

    public function store(Request $request)
    {
        $email = $request->email;
        $fName = $request->fName;
        $lName = $request->lName;
        $company = $request->company;
        $address = $request->address;
        $city = $request->city;
        $country = $request->country;
        $postalCode = $request->postalCode;
        $phone = $request->phone;
        $shipping_method = $request->ship_name;
        $payment_method = $request->pay_name;
        $quantity = $request->quantity;
        $product = Product::where('name',$request->product_name)->first();
        $product_id = $product->id;
        $total_price = $request->total_price;
        $size = $request->size;
        $ship_price = $request->ship_price;

        return view('user.checkout',compact('total_price','ship_price','size','quantity','product_id','email','fName','lName','company','address','city','country','postalCode','phone','shipping_method','payment_method'));
    }
}
