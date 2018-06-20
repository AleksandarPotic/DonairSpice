<?php

namespace App\Http\Controllers\Admin;

use App\Model\FulfilledOrder;
use App\Model\Order;
use App\Model\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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
        $orders = FulfilledOrder::all();

        $h1 = 0;
        $h2 = 0;
        $h3 = 0;
        $h4 = 0;
        $h5 = 0;
        $h6 = 0;
        $h7 = 0;
        $h8 = 0;

        $y1 = 0;
        $y2 = 0;
        $y3 = 0;
        $y4 = 0;
        $y5 = 0;
        $y6 = 0;
        $y7 = 0;
        $y8 = 0;
        $y9 = 0;
        $y10 = 0;
        $y11 = 0;
        $y12 = 0;

        $total_sales = 0;

        $time_now = date("Y/m/d");
        $month_now = date('Y/m');
        $year_now = date('Y');
        foreach ($orders as $order) {


            if (date_format($order->created_at, "Y/m/d") == $time_now) {

                $total_sales = $total_sales + $order->total_price;

                if (0 <= date_format($order->created_at, "H") && 2 >= date_format($order->created_at, "H")) {
                    $h1 = $h1 + $order->total_price;
                } else if (3 <= date_format($order->created_at, "H") && 5 >= date_format($order->created_at, "H")) {
                    $h2 = $h2 + $order->total_price;
                } else if (6 <= date_format($order->created_at, "H") && 8 >= date_format($order->created_at, "H")) {
                    $h3 = $h3 + $order->total_price;
                } else if (9 <= date_format($order->created_at, "H") && 11 >= date_format($order->created_at, "H")) {
                    $h4 = $h4 + $order->total_price;
                } else if (12 <= date_format($order->created_at, "H") && 14 >= date_format($order->created_at, "H")) {
                    $h5 = $h5 + $order->total_price;
                } else if (15 <= date_format($order->created_at, "H") && 17 >= date_format($order->created_at, "H")) {
                    $h6 = $h6 + $order->total_price;
                } else if (18 <= date_format($order->created_at, "H") && 20 >= date_format($order->created_at, "H")) {
                    $h7 = $h7 + $order->total_price;
                } else if (21 <= date_format($order->created_at, "H") && 23 >= date_format($order->created_at, "H")) {
                    $h8 = $h8 + $order->total_price;
                }

            }

            if (date_format($order->created_at,"Y") == $year_now) {

                if (1 == date_format($order->created_at,"m")) {
                    $y1 = $y1 + $order->total_price;
                } else if (2 == date_format($order->created_at,"m")) {
                    $y2 = $y2 + $order->total_price;
                } else if (3 == date_format($order->created_at,"m")) {
                    $y3 = $y3 + $order->total_price;
                } else if (4 == date_format($order->created_at,"m")) {
                    $y4 = $y4 + $order->total_price;
                } else if (5 == date_format($order->created_at,"m")) {
                    $y5 = $y5 + $order->total_price;
                } else if (6 == date_format($order->created_at,"m")) {
                    $y6 = $y6 + $order->total_price;
                } else if (7 == date_format($order->created_at,"m")) {
                    $y7 = $y7 + $order->total_price;
                } else if (8 == date_format($order->created_at,"m")) {
                    $y8 = $y8 + $order->total_price;
                } else if (9 == date_format($order->created_at,"m")) {
                    $y9 = $y9 + $order->total_price;
                } else if (10 == date_format($order->created_at,"m")) {
                    $y10 = $y10 + $order->total_price;
                } else if (11 == date_format($order->created_at,"m")) {
                    $y11 = $y11 + $order->total_price;
                } else if (12 == date_format($order->created_at,"m")) {
                    $y12 = $y12 + $order->total_price;
                }
            }
        }

        $item_orders = Order::all();
        $users = User::all();
        $products = Product::all();

        $inventory_products = Product::where('inventory_status','<',11)->get();


        return view('admin.home',compact('item_orders','products','inventory_products','users','total_sales','h1','h2','h3','h4','h5','h6','h7','h8','y1','y2','y3','y4','y5','y6','y7','y8','y9','y10','y11','y12'));
    }
}
