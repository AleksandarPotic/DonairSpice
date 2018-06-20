@extends('admin.layouts.app')
@section('head-part')
    <style>
        .show_css {
            position: absolute;
            display: none;
            background-color: white;
            font-family: Agency FB;
            font-weight: bold;
            color: #0a0a0a;
            -webkit-box-shadow: 0 0 10px gray;
            box-shadow: 0 0 10px gray;
            width: 260px;
            margin-left: -20px;
            padding-bottom: 0px;
            padding-left: 20px;
            padding-right: 20px;
        }
        .show_css .fa {
            padding-right: 10px;
        }
        @media only screen and (max-width: 800px) {
            .show_css {
                background-color: white;
                margin-left: -10px;
                width: 240px;
            }
        }
        @media only screen and (max-width: 450px) {
            .show_css {
                background-color: white;
                margin-left: -10px;
                width: 280px;
            }
        }
    </style>
    @endsection
@section('Order','active')
@section('body-part')

    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Orders</h3>
                            @if(session()->has('message_alert'))
                                <br>
                                <br>
                                <p class="alert alert-success">{{ session('message_alert') }}</p>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive" id="table_responsive_r">

                                @if($orders->count())
                                    @foreach($orders as $order)


                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 order-box" style="height: 400px!important;">
                                            <div class="box-item" id="row_id_{{ $order->id }}" style="@if($order->fulfilment_status == 'Fulfilled' or $order->fulfilment_status == 'Unfulfilled') background-color: rgb(255, 161, 150); @elseif($order->fulfilment_status == 'Accepted') background-color: #DCFFAB;@endif">

                                                <p>Date: {{ date_format($order->created_at,"M d, h:i A") }}</p>
                                                <p>Order: #{{ $order->id }}</p>
                                                <p>Customer:

                                                    <button type="button" id="show_pop" style="text-decoration: none; border: none; background: none;" onclick="CustomerShow('{{ $order->id }}')">
                                                            {{ $order->fName }} {{ $order->lName }} <span class="caret" id="show_pop"></span>
                                                    </button>
                                                    <!-- Single button -->
                                                    <div class="target_show show_css show_customer" id="show_customer_{{ $order->id }}">
                                                        <h4 class="target_show" style="color: dodgerblue">{{ $order->fName }} {{ $order->lName }}</h4>
                                                        <h5 class="target_show">Address: {{ $order->address }}
                                                            <br> City: {{ $order->city }}<br>Country: {{ $order->country }}
                                                            <br> Postal Code: {{ $order->postalCode }}</h5>
                                                        <h5 class="target_show">Phone: {{ $order->phone }}</h5>
                                                            @if($order->company) <h5 class="target_show">Company: {{ $order->company }}</h5> @endif
                                                        <h5 class="target_show">Email: {{ $order->email }}</h5>
                                                        <h5 class="target_show">Shipping method: {{ $order->shipping_method }}</h5>
                                                        <h5 class="target_show">Payment method: {{ $order->payment_method }}
                                                            @if($order->transaction_id) <br>Transaction Id: {{ $order->transaction_id }} @endif </h5>
                                                    </div>

                                                </p>

                                                <p>Product: {{ $order->product->name }} {{ $order->size }} Pcs</p>

                                                <p>Quantity: {{ $order->quantity }}</p>


                                                <p>Total: ${{ number_format($order->total_price,2) }}</p>
                                                <p id="fulfilment_status_{{ $order->id }}" data-toggle="modal" data-target="#model_fulfilled" onclick="Fulfilled('{{ $order->id }}')" style="cursor: pointer;">
                                                    Fulfilment Status: @if($order->fulfilment_status == 'Accepted') Fulfilled @elseif($order->fulfilment_status == 'Fulfilled') Unfulfilled @else {{ $order->fulfilment_status }} @endif
                                                </p>
                                                
                                            </div>
                                        </div>

                                    @endforeach
                                @else
                                
                                    <div class="alert alert-warning alert-dismissible text-center">
                                        There are no Orders at the moment.
                                    </div>

                                @endif


                            </div>
                        </div>
                        <!-- /.box-body -->
                        <input type="hidden" id="count_order" value="{{ $orders->count() }}">
                        <div id="load_count">
                            <input type="hidden" id="count_order_2" value="{{ $orders->count() }}">
                        </div>
                        <!-- Modal Delete -->
                        <div class="modal fade modal-delete" id="model_fulfilled" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <input type="hidden" id="fulfilled_id" value="">
                                        <h4>This order has been fulfilled?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success btn-block btn-flat" onclick="YesFunction()" data-dismiss="modal">Yes</button>
                                        <button type="button" class="btn btn-danger btn-block btn-flat" onclick="NoFunction()" data-dismiss="modal">No</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
@csrf
@endsection
@section('script-part')
    <script>
        function ProductShow(id) {
            $("#show_product_"+id).slideToggle();
        }
        function CustomerShow(id) {
            $("#show_customer_"+id).slideToggle();
        }
        function Fulfilled(id) {
            $("#fulfilled_id").val(id);
        }
        function YesFunction() {
            var id = $("#fulfilled_id").val();

            $.post('{{ route('order.yes') }}', {'id': id,'_token': $('input[name=_token]').val()}, function (data) {
                $("#row_id_"+id).css({'background-color' : '#DCFFAB'});
                $("#fulfilment_status_"+id).text('Fulfilment Status: Fulfilled');
                $("#fulfilment_status_"+id).attr('data-target','no');
            });

            setTimeout(function () {
                $.post('{{ route('order.accept') }}', {'id': id,'_token': $('input[name=_token]').val()}, function (data) {
                    $("#table_responsive_r").load(location.href + " #table_responsive_r");
                });
            }, 5000);

        }
        function NoFunction() {
            var id = $("#fulfilled_id").val();

            $.post('{{ route('order.no') }}', {'id': id,'_token': $('input[name=_token]').val()}, function (data) {
                $("#row_id_"+id).css({'background-color': 'rgb(255,161,150)'});
                $("#fulfilment_status_"+id).text('Fulfilment Status: Unfulfilled');
            });
        }

        $(document).click(function (event) {
            var element = event.target;

            var e1 = element.className.substr(0,11);
            var e2 = element.id;
            if (e1 == 'target_show') {
                return false;
            }
            if (e2 != 'show_pop') {
                $(".show_css").slideUp();
            }
        });

        $(document).ready(function () {

            var x = $("#count_order").val();

            setInterval(function() {

                $("#load_count").load(location.href + " #load_count");
                var y =  $("#count_order_2").val();

                if (y > x) {
                    $("#table_responsive_r").load(location.href + " #table_responsive_r");
                }

                x = y;

            }, 2000);

        });

    </script>
    @endsection