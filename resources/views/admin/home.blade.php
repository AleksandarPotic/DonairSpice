@extends('admin.layouts.app')
@section('Dashboard','active')
@section('body-part')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard Donair Spice
                <small>Control Panel</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $item_orders->count() }}</h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>${{ number_format($total_sales,2) }}</h3>

                            <p>Amount This Day</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        <a href="{{ route('analytics.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $users->count() }}</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $products->count() }}</h3>

                            <p>Products</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-folder-o"></i>
                        </div>
                        <a href="{{ route('products.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

            </div>
            <div class="row">

                <div class="col-lg-5 col-xs-12">
                    <!-- BAR CHART -->
                    <div class="box box-default">
                        <div class="box-header with-border">

                            <!-- Daily chart -->
                            <input type="hidden" id="h1" value="{{ $h1 }}">
                            <input type="hidden" id="h2" value="{{ $h2 }}">
                            <input type="hidden" id="h3" value="{{ $h3 }}">
                            <input type="hidden" id="h4" value="{{ $h4 }}">
                            <input type="hidden" id="h5" value="{{ $h5 }}">
                            <input type="hidden" id="h6" value="{{ $h6 }}">
                            <input type="hidden" id="h7" value="{{ $h7 }}">
                            <input type="hidden" id="h8" value="{{ $h8 }}">

                            <div class="col-lg-12 col-xs-12">
                                <h3 class="box-title">Sales Analytics This Day</h3>
                            </div>

                            <div class="box-body chart-responsive">
                                <div class="chart day_o" id="sales-day-chart" style="height: 250px;"></div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-lg-7 col-xs-12">
                    <!-- BAR CHART -->
                    <div class="box box-default">
                        <div class="box-header with-border">

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

                            <div class="col-lg-12 col-xs-12">
                                <h3 class="box-title">Sales Analytics This Year</h3>
                            </div>

                            <div class="box-body chart-responsive">
                                <div class="chart year_o" id="sales-year-chart" style="height: 250px;"></div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    @endsection

@section('script-part')


    <script>
        $(function () {

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
                barColors: ['#f56954'],
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Total Price($)'],
                hideHover: 'auto'
            });
        });
    </script>
    @endsection