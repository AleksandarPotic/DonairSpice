@extends('admin.layouts.app')
@section('Coupons','active')
@section('body-part')

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Create Coupon</h3>
                            <br>
                            @include('errors.error')
                            <a href="{{ route('coupons.index') }}"><button class="btn btn-flat btn-success">Back</button></a>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('coupons.store') }}" method="POST">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Code</label>
                                    <input type="text" name="code" class="form-control" id="exampleInputEmail1" placeholder="Enter Code" style="text-transform: uppercase;" required>
                                </div>
                                <div>
                                    <label for="exampleInputEmail1">Coupon Type</label>
                                    <select name="coupon_type" class="form-control">
                                        <option value="percent">Percent</option>
                                        <option value="fixed">Fixed</option>
                                    </select>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Percent Off(%)</label>
                                    <input type="number" step="any" name="percent_off" class="form-control" id="exampleInputEmail1" placeholder="Enter percent">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price Off($)</label>
                                    <input type="number" step="any" name="price_off" class="form-control" id="exampleInputEmail1" placeholder="Enter price">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>

    @endsection