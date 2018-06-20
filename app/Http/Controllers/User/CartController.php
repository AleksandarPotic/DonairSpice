<?php

namespace App\Http\Controllers\User;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Cart::count() == 0) {
            $name = $request->name;
            if ($request->size == 5) {
                $price = 29.99;
            } else {
                $price = 59.99;
            }
            $qty = $request->quantity;
            $size = $request->size;

            Cart::add('293ad', $name, $qty, $price,['size' => $size]);

            return redirect()->route('cart')->with('message_coupon','Successfully added product to cart.');
        } else {

            return redirect()->route('cart')->with('message_coupon','Product has already been added to cart.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Cart::destroy();

        return view('user.cart2');
    }

    public function qty(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;

        Cart::update($rowId, ['qty' => $qty]);

        return view('user.cart2');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
