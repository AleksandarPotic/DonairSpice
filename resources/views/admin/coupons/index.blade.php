@extends('admin.layouts.app')

@section('Coupons','active')
@section('body-part')

    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Coupons</h3>
                            <br>
                            <a href="{{ route('coupons.create') }}"><button class="btn btn-flat btn-success">New</button></a>
                            @if(session()->has('message_alert'))
                                <br>
                                <br>
                                <p class="alert alert-success">{{ session('message_alert') }}</p>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Percent Off(%)</th>
                                        <th>Price Off($)</th>
                                        <th>Send</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coupons as $coupon)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $coupon->code }}</td>
                                            <td>{{ $coupon->coupon_type }}</td>
                                            <td>@if($coupon->percent_off) {{ $coupon->percent_off }} @else - @endif</td>
                                            <td>@if($coupon->price_off) {{ $coupon->price_off }} @else - @endif</td>
                                            <td>
                                                <form action="{{ route('coupons.send') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="code" value="{{ $coupon->code }}">
                                                    <button type="submit" class="btn btn-flat btn-block btn-info"><span class="fa fa-send"></span></button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('coupons.edit',$coupon->id) }}">
                                                    <button class="btn btn-flat btn-block btn-warning"><span class="fa fa-edit"></span></button>
                                                </a>
                                            </td>
                                            <td>
                                                <form id="delete-form-{{ $coupon->id }}" method="POST" action="{{ route('coupons.destroy',$coupon->id) }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="" onclick="if(confirm('Do you really want to delete this coupon?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $coupon->id }}').submit();
                                                        }else{
                                                        event.preventDefault();
                                                        }">
                                                    <button class="btn btn-flat btn-block btn-danger"><span class="fa fa-trash"></span></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Percent Off(%)</th>
                                        <th>Price Off($)</th>
                                        <th>Send</th>
                                        <th>Update</th>
                                        <th>Delete</th>
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