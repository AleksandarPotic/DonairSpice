<?php

namespace App\Http\Controllers\Admin;

use App\Model\FulfilledOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnalyticController extends Controller
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

        $total_sales = 0;
        $day_sales = 0;
        $day_orders = 0;
        $month_sales = 0;
        $month_orders = 0;
        $year_sales = 0;
        $year_orders = 0;
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

        $w1 = 0;
        $w2 = 0;
        $w3 = 0;
        $w4 = 0;
        $w5 = 0;
        $w6 = 0;
        $w7 = 0;
        $w8 = 0;
        $w9 = 0;
        $w10 = 0;
        $w11 = 0;
        $w12 = 0;
        $w13 = 0;

        $d1 = 0;
        $d2 = 0;
        $d3 = 0;
        $d4 = 0;
        $d5 = 0;
        $d6 = 0;
        $d7 = 0;
        $d8 = 0;
        $d9 = 0;
        $d10 = 0;
        $d11 = 0;
        $d12 = 0;
        $d13 = 0;
        $d14 = 0;
        $d15 = 0;
        $d16 = 0;
        $d17 = 0;
        $d18 = 0;
        $d19 = 0;
        $d20 = 0;
        $d21 = 0;
        $d22 = 0;
        $d23 = 0;
        $d24 = 0;
        $d25 = 0;
        $d26 = 0;
        $d27 = 0;
        $d28 = 0;
        $d29 = 0;
        $d30 = 0;
        $d31 = 0;

        $time_now = date("Y/m/d");
        $month_now = date('Y/m');
        $year_now = date('Y');

        foreach ($orders as $order) {
            $total_sales = $total_sales + $order->total_price;

            if (date_format($order->created_at,"Y/m/d") == $time_now) {
                $day_sales = $day_sales + $order->total_price;
                $day_orders = $day_orders + 1;

                if (0 <= date_format($order->created_at,"H") && 2 >= date_format($order->created_at,"H")) {
                    $h1 = $h1 + $order->total_price;
                }else if (3 <= date_format($order->created_at,"H") && 5 >= date_format($order->created_at,"H")) {
                    $h2 = $h2 + $order->total_price;
                }else if (6 <= date_format($order->created_at,"H") && 8 >= date_format($order->created_at,"H")) {
                    $h3 = $h3 + $order->total_price;
                }else if (9 <= date_format($order->created_at,"H") && 11 >= date_format($order->created_at,"H")) {
                    $h4 = $h4 + $order->total_price;
                }else if (12 <= date_format($order->created_at,"H") && 14 >= date_format($order->created_at,"H")) {
                    $h5 = $h5 + $order->total_price;
                }else if (15 <= date_format($order->created_at,"H") && 17 >= date_format($order->created_at,"H")) {
                    $h6 = $h6 + $order->total_price;
                }else if (18 <= date_format($order->created_at,"H") && 20 >= date_format($order->created_at,"H")) {
                    $h7 = $h7 + $order->total_price;
                }else if (21 <= date_format($order->created_at,"H") && 23 >= date_format($order->created_at,"H")) {
                    $h8 = $h8 + $order->total_price;
                }

            }
            if (date_format($order->created_at,"Y/m") == $month_now) {
                $month_sales = $month_sales + $order->total_price;
                $month_orders = $month_orders + 1;

                if (1 == date_format($order->created_at,"d")) {
                    $d1 = $d1 + $order->total_price;
                } else if (2 == date_format($order->created_at,"d")) {
                    $d2 = $d2 + $order->total_price;
                } else if (3 == date_format($order->created_at,"d")) {
                    $d3 = $d3 + $order->total_price;
                } else if (4 == date_format($order->created_at,"d")) {
                    $d4 = $d4 + $order->total_price;
                } else if (5 == date_format($order->created_at,"d")) {
                    $d5 = $d5 + $order->total_price;
                } else if (6 == date_format($order->created_at,"d")) {
                    $d6 = $d6 + $order->total_price;
                } else if (7 == date_format($order->created_at,"d")) {
                    $d7 = $d7 + $order->total_price;
                } else if (8 == date_format($order->created_at,"d")) {
                    $d8 = $d8 + $order->total_price;
                } else if (9 == date_format($order->created_at,"d")) {
                    $d9 = $d9 + $order->total_price;
                } else if (10 == date_format($order->created_at,"d")) {
                    $d10 = $d10 + $order->total_price;
                } else if (11 == date_format($order->created_at,"d")) {
                    $d11 = $d11 + $order->total_price;
                } else if (12 == date_format($order->created_at,"d")) {
                    $d12 = $d12 + $order->total_price;
                } else if (13 == date_format($order->created_at,"d")) {
                    $d13 = $d13 + $order->total_price;
                } else if (14 == date_format($order->created_at,"d")) {
                    $d14 = $d14 + $order->total_price;
                } else if (15 == date_format($order->created_at,"d")) {
                    $d15 = $d15 + $order->total_price;
                } else if (16 == date_format($order->created_at,"d")) {
                    $d16 = $d16 + $order->total_price;
                } else if (17 == date_format($order->created_at,"d")) {
                    $d17 = $d17 + $order->total_price;
                } else if (18 == date_format($order->created_at,"d")) {
                    $d18 = $d18 + $order->total_price;
                } else if (19 == date_format($order->created_at,"d")) {
                    $d19 = $d19 + $order->total_price;
                } else if (20 == date_format($order->created_at,"d")) {
                    $d20 = $d20 + $order->total_price;
                } else if (21 == date_format($order->created_at,"d")) {
                    $d21 = $d21 + $order->total_price;
                } else if (22 == date_format($order->created_at,"d")) {
                    $d22 = $d22 + $order->total_price;
                } else if (23 == date_format($order->created_at,"d")) {
                    $d23 = $d23 + $order->total_price;
                } else if (24 == date_format($order->created_at,"d")) {
                    $d24 = $d24 + $order->total_price;
                } else if (25 == date_format($order->created_at,"d")) {
                    $d25 = $d25 + $order->total_price;
                } else if (26 == date_format($order->created_at,"d")) {
                    $d26 = $d26 + $order->total_price;
                } else if (27 == date_format($order->created_at,"d")) {
                    $d27 = $d27 + $order->total_price;
                } else if (28 == date_format($order->created_at,"d")) {
                    $d28 = $d28 + $order->total_price;
                } else if (29 == date_format($order->created_at,"d")) {
                    $d29 = $d29 + $order->total_price;
                } else if (30 == date_format($order->created_at,"d")) {
                    $d30 = $d30 + $order->total_price;
                } else if (31 == date_format($order->created_at,"d")) {
                    $d31 = $d31 + $order->total_price;
                }
            }
            if (date_format($order->created_at,"Y") == $year_now) {
                $year_sales = $year_sales + $order->total_price;
                $year_orders = $year_orders + 1;

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

            if (2018 == date_format($order->created_at,"Y")) {
                $w1 = $w1 + $order->total_price;
            } else if (2019 == date_format($order->created_at,"Y")) {
                $w2 = $w2 + $order->total_price;
            } else if (2020 == date_format($order->created_at,"Y")) {
                $w3 = $w3 + $order->total_price;
            } else if (2021 == date_format($order->created_at,"Y")) {
                $w4 = $w4 + $order->total_price;
            } else if (2022 == date_format($order->created_at,"Y")) {
                $w5 = $w5 + $order->total_price;
            } else if (2023 == date_format($order->created_at,"Y")) {
                $w6 = $w6 + $order->total_price;
            } else if (2024 == date_format($order->created_at,"Y")) {
                $w7 = $w7 + $order->total_price;
            } else if (2025 == date_format($order->created_at,"Y")) {
                $w8 = $w8 + $order->total_price;
            } else if (2026 == date_format($order->created_at,"Y")) {
                $w9 = $w9 + $order->total_price;
            } else if (2027 == date_format($order->created_at,"Y")) {
                $w10 = $w10 + $order->total_price;
            } else if (2028 == date_format($order->created_at,"Y")) {
                $w11 = $w11 + $order->total_price;
            } else if (2029 == date_format($order->created_at,"Y")) {
                $w12 = $w12 + $order->total_price;
            } else if (2030 == date_format($order->created_at,"Y")) {
                $w13 = $w13 + $order->total_price;
            }
        }

        return view('admin.analytics.index',compact('orders','total_sales','day_sales','day_orders','month_orders','month_sales','year_orders','year_sales','h1','h2','h3','h4','h5','h6','h7','h8','y1','y2','y3','y4','y5','y6','y7','y8','y9','y10','y11','y12','d1','d2','d3','d4','d5','d6','d7','d8','d9','d10','d11','d12','d13','d14','d15','d16','d17','d18','d19','d20','d21','d22','d23','d24','d25','d26','d27','d28','d29','d30','d31','w1','w2','w3','w4','w5','w6','w7','w8','w9','w10','w11','w12','w13'));
    }

    public function sales(Request $request)
    {
        $time = $request->day;

        $orders = FulfilledOrder::all();
        $total_sales = 0;
        $day_sales = 0;
        $day_orders = 0;
        $month_sales = 0;
        $month_orders = 0;
        $year_sales = 0;
        $year_orders = 0;
        $h1 = 0;
        $h2 = 0;
        $h3 = 0;
        $h4 = 0;
        $h5 = 0;
        $h6 = 0;
        $h7 = 0;
        $h8 = 0;

        $w1 = 0;
        $w2 = 0;
        $w3 = 0;
        $w4 = 0;
        $w5 = 0;
        $w6 = 0;
        $w7 = 0;
        $w8 = 0;
        $w9 = 0;
        $w10 = 0;
        $w11 = 0;
        $w12 = 0;
        $w13 = 0;

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

        $d1 = 0;
        $d2 = 0;
        $d3 = 0;
        $d4 = 0;
        $d5 = 0;
        $d6 = 0;
        $d7 = 0;
        $d8 = 0;
        $d9 = 0;
        $d10 = 0;
        $d11 = 0;
        $d12 = 0;
        $d13 = 0;
        $d14 = 0;
        $d15 = 0;
        $d16 = 0;
        $d17 = 0;
        $d18 = 0;
        $d19 = 0;
        $d20 = 0;
        $d21 = 0;
        $d22 = 0;
        $d23 = 0;
        $d24 = 0;
        $d25 = 0;
        $d26 = 0;
        $d27 = 0;
        $d28 = 0;
        $d29 = 0;
        $d30 = 0;
        $d31 = 0;

        $time_now = $time;
        $month_now = substr($time,0,7);
        $year_now = substr($time,0,4);

        foreach ($orders as $order) {
            $total_sales = $total_sales + $order->total_price;

            if (date_format($order->created_at,"Y-m-d") == $time_now) {
                $day_sales = $day_sales + $order->total_price;
                $day_orders = $day_orders + 1;

                if (0 <= date_format($order->created_at,"H") && 2 >= date_format($order->created_at,"H")) {
                    $h1 = $h1 + $order->total_price;
                }else if (3 <= date_format($order->created_at,"H") && 5 >= date_format($order->created_at,"H")) {
                    $h2 = $h2 + $order->total_price;
                }else if (6 <= date_format($order->created_at,"H") && 8 >= date_format($order->created_at,"H")) {
                    $h3 = $h3 + $order->total_price;
                }else if (9 <= date_format($order->created_at,"H") && 11 >= date_format($order->created_at,"H")) {
                    $h4 = $h4 + $order->total_price;
                }else if (12 <= date_format($order->created_at,"H") && 14 >= date_format($order->created_at,"H")) {
                    $h5 = $h5 + $order->total_price;
                }else if (15 <= date_format($order->created_at,"H") && 17 >= date_format($order->created_at,"H")) {
                    $h6 = $h6 + $order->total_price;
                }else if (18 <= date_format($order->created_at,"H") && 20 >= date_format($order->created_at,"H")) {
                    $h7 = $h7 + $order->total_price;
                }else if (21 <= date_format($order->created_at,"H") && 23 >= date_format($order->created_at,"H")) {
                    $h8 = $h8 + $order->total_price;
                }
            }
            if (date_format($order->created_at,"Y-m") == $month_now) {
                $month_sales = $month_sales + $order->total_price;
                $month_orders = $month_orders + 1;


                if (1 == date_format($order->created_at,"d")) {
                    $d1 = $d1 + $order->total_price;
                } else if (2 == date_format($order->created_at,"d")) {
                    $d2 = $d2 + $order->total_price;
                } else if (3 == date_format($order->created_at,"d")) {
                    $d3 = $d3 + $order->total_price;
                } else if (4 == date_format($order->created_at,"d")) {
                    $d4 = $d4 + $order->total_price;
                } else if (5 == date_format($order->created_at,"d")) {
                    $d5 = $d5 + $order->total_price;
                } else if (6 == date_format($order->created_at,"d")) {
                    $d6 = $d6 + $order->total_price;
                } else if (7 == date_format($order->created_at,"d")) {
                    $d7 = $d7 + $order->total_price;
                } else if (8 == date_format($order->created_at,"d")) {
                    $d8 = $d8 + $order->total_price;
                } else if (9 == date_format($order->created_at,"d")) {
                    $d9 = $d9 + $order->total_price;
                } else if (10 == date_format($order->created_at,"d")) {
                    $d10 = $d10 + $order->total_price;
                } else if (11 == date_format($order->created_at,"d")) {
                    $d11 = $d11 + $order->total_price;
                } else if (12 == date_format($order->created_at,"d")) {
                    $d12 = $d12 + $order->total_price;
                } else if (13 == date_format($order->created_at,"d")) {
                    $d13 = $d13 + $order->total_price;
                } else if (14 == date_format($order->created_at,"d")) {
                    $d14 = $d14 + $order->total_price;
                } else if (15 == date_format($order->created_at,"d")) {
                    $d15 = $d15 + $order->total_price;
                } else if (16 == date_format($order->created_at,"d")) {
                    $d16 = $d16 + $order->total_price;
                } else if (17 == date_format($order->created_at,"d")) {
                    $d17 = $d17 + $order->total_price;
                } else if (18 == date_format($order->created_at,"d")) {
                    $d18 = $d18 + $order->total_price;
                } else if (19 == date_format($order->created_at,"d")) {
                    $d19 = $d19 + $order->total_price;
                } else if (20 == date_format($order->created_at,"d")) {
                    $d20 = $d20 + $order->total_price;
                } else if (21 == date_format($order->created_at,"d")) {
                    $d21 = $d21 + $order->total_price;
                } else if (22 == date_format($order->created_at,"d")) {
                    $d22 = $d22 + $order->total_price;
                } else if (23 == date_format($order->created_at,"d")) {
                    $d23 = $d23 + $order->total_price;
                } else if (24 == date_format($order->created_at,"d")) {
                    $d24 = $d24 + $order->total_price;
                } else if (25 == date_format($order->created_at,"d")) {
                    $d25 = $d25 + $order->total_price;
                } else if (26 == date_format($order->created_at,"d")) {
                    $d26 = $d26 + $order->total_price;
                } else if (27 == date_format($order->created_at,"d")) {
                    $d27 = $d27 + $order->total_price;
                } else if (28 == date_format($order->created_at,"d")) {
                    $d28 = $d28 + $order->total_price;
                } else if (29 == date_format($order->created_at,"d")) {
                    $d29 = $d29 + $order->total_price;
                } else if (30 == date_format($order->created_at,"d")) {
                    $d30 = $d30 + $order->total_price;
                } else if (31 == date_format($order->created_at,"d")) {
                    $d31 = $d31 + $order->total_price;
                }
            }
            if (date_format($order->created_at,"Y") == $year_now) {
                $year_sales = $year_sales + $order->total_price;
                $year_orders = $year_orders + 1;

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

            if (2018 == date_format($order->created_at,"Y")) {
                $w1 = $w1 + $order->total_price;
            } else if (2019 == date_format($order->created_at,"Y")) {
                $w2 = $w2 + $order->total_price;
            } else if (2020 == date_format($order->created_at,"Y")) {
                $w3 = $w3 + $order->total_price;
            } else if (2021 == date_format($order->created_at,"Y")) {
                $w4 = $w4 + $order->total_price;
            } else if (2022 == date_format($order->created_at,"Y")) {
                $w5 = $w5 + $order->total_price;
            } else if (2023 == date_format($order->created_at,"Y")) {
                $w6 = $w6 + $order->total_price;
            } else if (2024 == date_format($order->created_at,"Y")) {
                $w7 = $w7 + $order->total_price;
            } else if (2025 == date_format($order->created_at,"Y")) {
                $w8 = $w8 + $order->total_price;
            } else if (2026 == date_format($order->created_at,"Y")) {
                $w9 = $w9 + $order->total_price;
            } else if (2027 == date_format($order->created_at,"Y")) {
                $w10 = $w10 + $order->total_price;
            } else if (2028 == date_format($order->created_at,"Y")) {
                $w11 = $w11 + $order->total_price;
            } else if (2029 == date_format($order->created_at,"Y")) {
                $w12 = $w12 + $order->total_price;
            } else if (2030 == date_format($order->created_at,"Y")) {
                $w13 = $w13 + $order->total_price;
            }
        }
        return view('admin.analytics.sales',compact('orders','total_sales','day_sales','day_orders','month_orders','month_sales','year_orders','year_sales','h1','h2','h3','h4','h5','h6','h7','h8','y1','y2','y3','y4','y5','y6','y7','y8','y9','y10','y11','y12','d1','d2','d3','d4','d5','d6','d7','d8','d9','d10','d11','d12','d13','d14','d15','d16','d17','d18','d19','d20','d21','d22','d23','d24','d25','d26','d27','d28','d29','d30','d31','w1','w2','w3','w4','w5','w6','w7','w8','w9','w10','w11','w12','w13'));
    }
}
