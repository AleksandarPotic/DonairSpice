<?php

namespace App\Http\Controllers\User;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\User;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = new Order();

        $order->total_price = number_format($request->total_price,2);
        $order->quantity = $request->quantity;
        $order->product_id = $request->product_id;
        $order->size = $request->size;

        if ($request->user_id) {
            $order->user_id = $request->user_id;
            $user = User::where('id',$request->user_id)->first();

            if (session('coupon')) {
                $user->coupon_status = 0;
            }

            $total_spent = $user->total_spent;
            $total_spent = $total_spent + $request->total_price;
            $user->total_spent = $total_spent;

            $user->save();
        }

        $order->fName = $request->fName;
        $order->lName = $request->lName;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->company = $request->company;
        $order->country = $request->country;
        $order->postalCode = $request->postalCode;
        $order->shipping_method = $request->shipping_method;
        $order->payment_method = $request->payment_method;
        $order->fulfilment_status = 'Fulfilled';

        $order->save();

        Cart::destroy();
        session()->forget('coupon');

        return view('user.thank-you');
    }
}
