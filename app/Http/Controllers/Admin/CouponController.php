<?php

namespace App\Http\Controllers\Admin;

use App\Mail\CouponSend;
use App\Model\Coupon;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CouponController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = new Coupon();

        $coupon->code = strtoupper($request->code);
        $coupon->coupon_type = $request->coupon_type;
        if ($request->coupon_type == 'fixed') {
            $coupon->price_off = $request->price_off;
        } else {
            $coupon->percent_off = $request->percent_off;
        }

        $coupon->save();

        return redirect()->route('coupons.index')->with('message_alert','Coupon successfully created!');
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
        $coupon = Coupon::where('id',$id)->first();

        return view('admin.coupons.edit',compact('coupon'));
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
        $coupon = Coupon::where('id',$id)->first();

        $coupon->code = strtoupper($request->code);
        $coupon->coupon_type = $request->coupon_type;
        if ($request->coupon_type == 'fixed') {
            $coupon->price_off = $request->price_off;
        } else {
            $coupon->percent_off = $request->percent_off;
        }

        $coupon->save();

        return redirect()->route('coupons.index')->with('message_alert','Coupon successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::where('id',$id)->first();

        $coupon->delete();

        return redirect()->route('coupons.index')->with('message_alert','Coupon successfully deleted!');
    }
    /**
     * Send coupon to All User.
     */

    public function sendCoupon(Request $request)
    {
        $users = User::all();
        $code = $request->code;

        foreach ($users as $user) {
            $customer_email = $user->email;

            Mail::to($customer_email)->send(new CouponSend());

            $user->coupon_status = 1;

            $user->save();
        }

        return redirect()->route('coupons.index')->with('message_alert','Coupon successfully sent to all users!');
    }
}
