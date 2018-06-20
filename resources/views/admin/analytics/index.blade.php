@extends('admin.layouts.app')

@section('Analytics','active')
@section('body-part')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Analytics
                <small>Control Panel</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- Sales Chart -->
                <div class="col-md-12">
                    <!-- BAR CHART -->
                    <div class="box box-success">
                        <div class="box-header with-border">

                            <div class="col-lg-12 col-xs-12">
                                <h3 class="box-title">Sales Analytics</h3>
                            </div>
                            <div id="row_sales">
                                <!-- Daily chart -->
                                <input type="hidden" id="h1" value="{{ $h1 }}">
                                <input type="hidden" id="h2" value="{{ $h2 }}">
                                <input type="hidden" id="h3" value="{{ $h3 }}">
                                <input type="hidden" id="h4" value="{{ $h4 }}">
                                <input type="hidden" id="h5" value="{{ $h5 }}">
                                <input type="hidden" id="h6" value="{{ $h6 }}">
                                <input type="hidden" id="h7" value="{{ $h7 }}">
                                <input type="hidden" id="h8" value="{{ $h8 }}">
                                <!-- Monthly chart -->
                                <input type="hidden" id="d1" value="{{ $d1 }}">
                                <input type="hidden" id="d2" value="{{ $d2 }}">
                                <input type="hidden" id="d3" value="{{ $d3 }}">
                                <input type="hidden" id="d4" value="{{ $d4 }}">
                                <input type="hidden" id="d5" value="{{ $d5 }}">
                                <input type="hidden" id="d6" value="{{ $d6 }}">
                                <input type="hidden" id="d7" value="{{ $d7 }}">
                                <input type="hidden" id="d8" value="{{ $d8 }}">
                                <input type="hidden" id="d9" value="{{ $d9 }}">
                                <input type="hidden" id="d10" value="{{ $d10 }}">
                                <input type="hidden" id="d11" value="{{ $d11 }}">
                                <input type="hidden" id="d12" value="{{ $d12 }}">
                                <input type="hidden" id="d13" value="{{ $d13 }}">
                                <input type="hidden" id="d14" value="{{ $d14 }}">
                                <input type="hidden" id="d15" value="{{ $d15 }}">
                                <input type="hidden" id="d16" value="{{ $d16 }}">
                                <input type="hidden" id="d17" value="{{ $d17 }}">
                                <input type="hidden" id="d18" value="{{ $d18 }}">
                                <input type="hidden" id="d19" value="{{ $d19 }}">
                                <input type="hidden" id="d20" value="{{ $d20 }}">
                                <input type="hidden" id="d21" value="{{ $d21 }}">
                                <input type="hidden" id="d22" value="{{ $d22 }}">
                                <input type="hidden" id="d23" value="{{ $d23 }}">
                                <input type="hidden" id="d24" value="{{ $d24 }}">
                                <input type="hidden" id="d25" value="{{ $d25 }}">
                                <input type="hidden" id="d26" value="{{ $d26 }}">
                                <input type="hidden" id="d27" value="{{ $d27 }}">
                                <input type="hidden" id="d28" value="{{ $d28 }}">
                                <input type="hidden" id="d29" value="{{ $d29 }}">
                                <input type="hidden" id="d30" value="{{ $d30 }}">
                                <input type="hidden" id="d31" value="{{ $d31 }}">
                                <!-- Yearly chart -->
                                <input type="hidden" id="y1" value="{{ $y1 }}">
                                <input type="hidden" id="y2" value="{{ $y2 }}">
                                <input type="hidden" id="y3" value="{{ $y3 }}">
                                <input type="hidden" id="y4" value="{{ $y4 }}">
                                <input type="hidden" id="y5" value="{{ $y5 }}">
                                <input type="hidden" id="y6" value="{{ $y6 }}">
                                <input type="hidden" id="y7" value="{{ $y7 }}">
                                <input type="hidden" id="y8" value="{{ $y8 }}">
                                <input type="hidden" id="y9" value="{{ $y9 }}">
                                <input type="hidden" id="y10" value="{{ $y10 }}">
                                <input type="hidden" id="y11" value="{{ $y11 }}">
                                <input type="hidden" id="y12" value="{{ $y12 }}">
                                <!-- Yearly chart -->
                                <input type="hidden" id="w1" value="{{ $w1 }}">
                                <input type="hidden" id="w2" value="{{ $w2 }}">
                                <input type="hidden" id="w3" value="{{ $w3 }}">
                                <input type="hidden" id="w4" value="{{ $w4 }}">
                                <input type="hidden" id="w5" value="{{ $w5 }}">
                                <input type="hidden" id="w6" value="{{ $w6 }}">
                                <input type="hidden" id="w7" value="{{ $w7 }}">
                                <input type="hidden" id="w8" value="{{ $w8 }}">
                                <input type="hidden" id="w9" value="{{ $w9 }}">
                                <input type="hidden" id="w10" value="{{ $w10 }}">
                                <input type="hidden" id="w11" value="{{ $w11 }}">
                                <input type="hidden" id="w12" value="{{ $w12 }}">
                                <input type="hidden" id="w13" value="{{ $w13 }}">

                                <div class="col-lg-4 col-xs-12">
                                    <!-- small box -->
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h4 class="day_o">{{ $day_orders }}</h4>
                                            <h4 class="month_o" style="display: none">{{ $month_orders }}</h4>
                                            <h4 class="year_o" style="display: none">{{ $year_orders }}</h4>
                                            <h4 class="all_o" style="display: none">{{ $orders->count() }}</h4>

                                            <p class="day_o">Orders Day</p>
                                            <p class="month_o" style="display: none">Orders Month</p>
                                            <p class="year_o" style="display: none">Orders Year</p>
                                            <p class="all_o" style="display: none">Orders All Time</p>
                                        </div>
                                        <div class="icon" style="margin-top: -10px">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                    <!-- small box -->
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h4 class="day_o">${{ number_format($day_sales,2) }}</h4>
                                            <h4 class="month_o" style="display: none">${{ number_format($month_sales,2) }}</h4>
                                            <h4 class="year_o" style="display: none">${{ number_format($year_sales,2) }}</h4>
                                            <h4 class="all_o" style="display: none">${{ number_format($total_sales,2) }}</h4>

                                            <p class="day_o">Amount Day</p>
                                            <p class="month_o" style="display: none">Amount Month</p>
                                            <p class="year_o" style="display: none">Amount Year</p>
                                            <p class="all_o" style="display: none">Amount All Time</p>
                                        </div>
                                        <div class="icon" style="margin-top: -10px">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                    <!-- small box -->
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h4>${{ number_format($total_sales,2) }}</h4>

                                            <p>All Time</p>
                                        </div>
                                        <div class="icon" style="margin-top: -10px">
                                            <i class="fa fa-money"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <!-- select -->
                                <div class="form-group">
                                    <select class="form-control" onchange="ChangeValue()" id="change_value">
                                        <option>Daily</option>
                                        <option>Monthly</option>
                                        <option>Yearly</option>
                                        <option>All Time</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <!-- select -->
                                <input type="date" onchange="ChangeDate()" id="change_date" class="form-control">
                            </div>

                            <div class="box-body chart-responsive">
                                <div class="chart day_o" id="sales-day-chart" style="height: 250px;"></div>
                                <div class="chart month_o" id="sales-month-chart" style="height: 250px; display: none;"></div>
                                <div class="chart year_o" id="sales-year-chart" style="height: 250px; display: none;"></div>
                                <div class="chart all_o" id="sales-all-chart" style="height: 250px; display: none;"></div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
@csrf
@endsection

@section('script-part')

    <div id="id">
    <script>
        $(document).ready(function () {

            Chart();
            Chart2();

        });

        function ChangeValue()
        {
            var v = $("#change_value").val();

            if (v == 'Daily') {
                $('.day_o').show();
                $('.month_o').hide();
                $('.year_o').hide();
                $('.all_o').hide();
            } else if (v == 'Monthly') {
                $('.day_o').hide();
                $('.month_o').show();
                $('.year_o').hide();
                $('.all_o').hide();
            } else if (v == 'Yearly') {
                $('.day_o').hide();
                $('.month_o').hide();
                $('.year_o').show();
                $('.all_o').hide();
            } else {
                $('.day_o').hide();
                $('.month_o').hide();
                $('.year_o').hide();
                $('.all_o').show();
            }
        }

        function ChangeDate()
        {
            var d = $("#change_date").val();

            $.post('{{ route('analytics.sales') }}', {'day': d,'_token': $('input[name=_token]').val()}, function (data) {
                $("#row_sales").html(data);
                Chart();
            });

        }

        function Chart() {
            "use strict";
            var h1 = $("#h1").val();
            var h2 = $("#h2").val();
            var h3 = $("#h3").val();
            var h4 = $("#h4").val();
            var h5 = $("#h5").val();
            var h6 = $("#h6").val();
            var h7 = $("#h7").val();
            var h8 = $("#h8").val();

            var y1 = $("#y1").val();
            var y2 = $("#y2").val();
            var y3 = $("#y3").val();
            var y4 = $("#y4").val();
            var y5 = $("#y5").val();
            var y6 = $("#y6").val();
            var y7 = $("#y7").val();
            var y8 = $("#y8").val();
            var y9 = $("#y9").val();
            var y10 = $("#y10").val();
            var y11 = $("#y11").val();
            var y12 = $("#y12").val();

            var w1 = $("#w1").val();
            var w2 = $("#w2").val();
            var w3 = $("#w3").val();
            var w4 = $("#w4").val();
            var w5 = $("#w5").val();
            var w6 = $("#w6").val();
            var w7 = $("#w7").val();
            var w8 = $("#w8").val();
            var w9 = $("#w9").val();
            var w10 = $("#w10").val();
            var w11 = $("#w11").val();
            var w12 = $("#w12").val();
            var w13 = $("#w13").val();

            var d1 = $("#d1").val();
            var d2 = $("#d2").val();
            var d3 = $("#d3").val();
            var d4 = $("#d4").val();
            var d5 = $("#d5").val();
            var d6 = $("#d6").val();
            var d7 = $("#d7").val();
            var d8 = $("#d8").val();
            var d9 = $("#d9").val();
            var d10 = $("#d10").val();
            var d11 = $("#d11").val();
            var d12 = $("#d12").val();
            var d13 = $("#d13").val();
            var d14 = $("#d14").val();
            var d15 = $("#d15").val();
            var d16 = $("#d16").val();
            var d17 = $("#d17").val();
            var d18 = $("#d18").val();
            var d19 = $("#d19").val();
            var d20 = $("#d20").val();
            var d21 = $("#d21").val();
            var d22 = $("#d22").val();
            var d23 = $("#d23").val();
            var d24 = $("#d24").val();
            var d25 = $("#d25").val();
            var d26 = $("#d26").val();
            var d27 = $("#d27").val();
            var d28 = $("#d28").val();
            var d29 = $("#d29").val();
            var d30 = $("#d30").val();
            var d31 = $("#d31").val();
            //BAR CHART
            var bar = new Morris.Bar({
                element: 'sales-day-chart',
                resize: true,
                data: [
                    {h: '0am - 3am', a: h1},
                    {h: '3am - 6am', a: h2},
                    {h: '6am - 9am', a: h3},
                    {h: '9am - 12am', a: h4},
                    {h: '12am - 3pm', a: h5},
                    {h: '3pm - 6pm', a: h6},
                    {h: '6pm - 9pm', a: h7},
                    {h: '9pm - 12pm', a: h8}
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'h',
                ykeys: ['a'],
                labels: ['Total Price($)'],
                hideHover: 'auto'
            });
            var bar = new Morris.Bar({
                element: 'sales-month-chart',
                resize: true,
                data: [
                    {d: '01', a: d1},
                    {d: '02', a: d2},
                    {d: '03', a: d3},
                    {d: '04', a: d4},
                    {d: '05', a: d5},
                    {d: '06', a: d6},
                    {d: '07', a: d7},
                    {d: '08', a: d8},
                    {d: '09', a: d9},
                    {d: '10', a: d10},
                    {d: '11', a: d11},
                    {d: '12', a: d12},
                    {d: '13', a: d13},
                    {d: '14', a: d14},
                    {d: '15', a: d15},
                    {d: '16', a: d16},
                    {d: '17', a: d17},
                    {d: '18', a: d18},
                    {d: '19', a: d19},
                    {d: '20', a: d20},
                    {d: '21', a: d21},
                    {d: '22', a: d22},
                    {d: '23', a: d23},
                    {d: '24', a: d24},
                    {d: '25', a: d25},
                    {d: '26', a: d26},
                    {d: '27', a: d27},
                    {d: '28', a: d28},
                    {d: '29', a: d29},
                    {d: '30', a: d30},
                    {d: '31', a: d31},
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'd',
                ykeys: ['a'],
                labels: ['Total Price($)'],
                hideHover: 'auto'
            });
            var bar = new Morris.Bar({
                element: 'sales-year-chart',
                resize: true,
                data: [
                    {y: 'Jan', a: y1},
                    {y: 'Feb', a: y2},
                    {y: 'Mar', a: y3},
                    {y: 'Apr', a: y4},
                    {y: 'May', a: y5},
                    {y: 'Jun', a: y6},
                    {y: 'Jul', a: y7},
                    {y: 'Avg', a: y8},
                    {y: 'Sep', a: y9},
                    {y: 'Oct', a: y10},
                    {y: 'Nov', a: y11},
                    {y: 'Dec', a: y12},
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Total Price($)'],
                hideHover: 'auto'
            });
            var bar = new Morris.Bar({
                element: 'sales-all-chart',
                resize: true,
                data: [
                    {w: '2018', a: w1},
                    {w: '2019', a: w2},
                    {w: '2020', a: w3},
                    {w: '2021', a: w4},
                    {w: '2022', a: w5},
                    {w: '2023', a: w6},
                    {w: '2024', a: w7},
                    {w: '2025', a: w8},
                    {w: '2026', a: w9},
                    {w: '2027', a: w10},
                    {w: '2028', a: w11},
                    {w: '2029', a: w12},
                    {w: '2030', a: w13},
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'w',
                ykeys: ['a'],
                labels: ['Total Price($)'],
                hideHover: 'auto'
            });


        };
        function Chart2() {

            //BAR CHART
            var bar = new Morris.Bar({
                element: 'bar-chart-two',
                resize: true,
                data: [
                    {y: '2006', a: 100, b: 80},
                    {y: '2007', a: 75, b: 65},
                    {y: '2008', a: 50, b: 40},
                    {y: '2009', a: 75, b: 65},
                    {y: '2010', a: 50, b: 40},
                    {y: '2011', a: 75, b: 65},
                    {y: '2012', a: 100, b: 90}
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['CPU', 'DISK'],
                hideHover: 'auto'
            });
        }
    </script>
    </div>
@endsection