<?php

namespace App\Http\Controllers\User;

use App\Model\FulfilledOrder;
use App\Model\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $orders = FulfilledOrder::where('user_id',$id)->get();

        return view('user.profile',compact('orders'));
    }
    public function info(Request $request)
    {
        $user = User::where('id',$request->id)->first();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->postal_code = $request->postal_code;
        $user->card = encrypt($request->card);
        $user->expiry_month = encrypt($request->expiry_month);
        $user->expiry_year = encrypt($request->expiry_year);
        $user->cvv = encrypt($request->cvv);

        $user->save();

        return redirect()->back();
    }
}
