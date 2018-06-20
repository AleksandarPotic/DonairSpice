@extends('admin.layouts.app')

@section('Fulfilled Orders','active')
@section('body-part')

    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Fulfilled Orders</h3>
                            @if(session()->has('message_alert'))
                                <br>
                                <br>
                                <p class="alert alert-success">{{ session('message_alert') }}</p>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>Size</th>
                                        <th>Date</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($fulfilled_orders as $fulfilled_order)
                                        <tr style="height: 80px;">
                                            <td>#{{ $fulfilled_order->id }}</td>
                                            <td>{{ $fulfilled_order->fName }} {{ $fulfilled_order->lName }}</td>
                                            <td>Donair Spice</td>
                                            <td> {{ $fulfilled_order->size }}</td>
                                            <td>{{ date_format($fulfilled_order->created_at,"M d, h:i A") }}</td>
                                            <td>{{ $fulfilled_order->quantity }}</td>
                                            <td>${{ number_format($fulfilled_order->total_price,2) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>Size</th>
                                        <th>Date</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>

@endsection