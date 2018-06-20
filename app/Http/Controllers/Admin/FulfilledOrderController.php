<?php

namespace App\Http\Controllers\Admin;

use App\Model\FulfilledOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FulfilledOrderController extends Controller
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
        $fulfilled_orders = FulfilledOrder::orderBy('id', 'desc')->get();
        return view('admin.fulfilled_orders.index',compact('fulfilled_orders'));
    }
}
