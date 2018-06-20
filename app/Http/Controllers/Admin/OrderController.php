<?php

namespace App\Http\Controllers\Admin;

use App\Model\FulfilledOrder;
use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderAccepted;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.orders.index',compact('orders'));
    }

    public function YesFunction(Request $request)
    {
        $id = $request->id;

        $order = Order::where('id',$id)->first();

        $order->fulfilment_status = 'Accepted';

        $order->save();
    }

    public function NoFunction(Request $request)
    {
        $id = $request->id;

        $order = Order::where('id',$id)->first();

        $order->fulfilment_status = 'Unfulfilled';

        $order->save();
    }
    public function AcceptFunction(Request $request)
    {

        $id = $request->id;

        $fulfilled = new FulfilledOrder();
        $order = Order::where('id',$id)->first();

        $fulfilled->total_price = $order->total_price;
        $fulfilled->quantity = $order->quantity;
        $fulfilled->size = $order->size;
        $fulfilled->product_id = $order->product_id;
        $fulfilled->user_id = $order->user_id;
        $fulfilled->fName = $order->fName;
        $fulfilled->lName = $order->lName;
        $fulfilled->email = $order->email;
        $fulfilled->company = $order->company;
        $fulfilled->phone = $order->phone;
        $fulfilled->address = $order->address;
        $fulfilled->city = $order->city;
        $fulfilled->country = $order->country;
        $fulfilled->postalCode = $order->postalCode;
        $fulfilled->shipping_method = $order->shipping_method;
        $fulfilled->payment_method = $order->payment_method;
        $fulfilled->transaction_id = $order->transaction_id;
        $fulfilled->user_id = $order->user_id;
        $fulfilled->fulfilment_status = $order->fulfilment_status;

        $email = $order->email;

        Mail::to($email)->send(new OrderAccepted());

        $fulfilled->save();
        $order->delete();

        return 'yes';
    }
}
