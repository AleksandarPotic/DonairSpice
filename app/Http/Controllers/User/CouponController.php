<?php

namespace App\Http\Controllers\User;

use App\Model\Coupon;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function coupon(Request $request)
    {
        $code = strtoupper($request->code);

        $user = User::where('id',$request->user_id)->first();

        if ($user->coupon_status) {

            $coupon = Coupon::where('code',$code)->first();

            if ($coupon) {

                if ($coupon->coupon_type == 'fixed') {
                    $discount = $coupon->price_off;
                    $newSubtotal = Cart::total() - $discount;
                    $discount_price = Cart::total() - $newSubtotal;

                } else {
                    $discount = $coupon->percent_off;
                    $newSubtotal = (Cart::total() / 100) * (100 - $discount);
                    $discount_price = Cart::total() - $newSubtotal;
                }

                session()->put('coupon', [
                    'name' => $code,
                    'discount' => $discount,
                    'type' => $coupon->coupon_type,
                    'discount_price' => $discount_price,
                    'newSubtotal' => $newSubtotal
                ]);

                return redirect()->back()->with('message_coupon','The coupon has been successfully used.');

            } else {
                return redirect()->back()->with('message_coupon','The coupon does not match.');
            }

        } else {
            return redirect()->back()->with('message_coupon','You already used that coupon.');
        }

    }

    public function destroy()
    {
        session()->forget('coupon');
        return redirect()->back()->with('message_coupon','Coupon successfully removed.');
    }
}
