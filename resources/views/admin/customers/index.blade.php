@extends('admin.layouts.app')

@section('Customers','active')
@section('body-part')

    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Customers</h3>
                            @if(session()->has('message_alert'))
                                <br>
                                <br>
                                <p class="alert alert-success">{{ session('message_alert') }}</p>
                            @endif
                            @include('errors.error')
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- ./col -->
                            <div class="col-lg-12 col-xs-12 col-md-12">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3>{{ $customers->count() }}</h3>
                                        <p>Total Customers</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('users.sendMail') }}" method="POST">
                                @csrf
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-flat btn-danger btn-block select_all">Check All</button>
                                    <br>
                                    <button type="button" class="btn btn-flat btn-danger btn-block uncheck_all">Uncheck All</button>
                                    <br>
                                </div>
                                <div class="col-lg-10">
                                    <!-- quick email widget -->
                                    <div class="box box-danger" style="border: 0.5px solid rgb(215,57,37); border-top: 5px solid rgb(215,57,37)">
                                        <div class="box-header">
                                            <i class="fa fa-envelope"></i>

                                            <h3 class="box-title">Send Email to Checked Users</h3>
                                        </div>
                                        <div class="box-body">
                                                <div>
                                                    <textarea class="textarea" placeholder="Message" name="body_message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                                                </div>
                                        </div>
                                        <div class="box-footer clearfix">
                                            <button type="submit" class="pull-right btn btn-danger" id="sendEmail">Send
                                                <i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive col-lg-12">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Total Spent($)</th>
                                            <th>Checked User</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customers as $customer)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                                <td>{{ $customer->email }}</td>
                                                <td>{{ $customer->address }}</td>
                                                <td>{{ $customer->phone }}</td>
                                                <td>{{ number_format($customer->total_spent,2) }}</td>
                                                <td>
                                                    <div class="checkboxFour">
                                                        <input type="checkbox" class="checked_user" style="display: none" id="checkboxFourInput{{ $customer->id }}" value="{{ $customer->id }}" name="checkbox_mail[]">
                                                        <label for="checkboxFourInput{{ $customer->id }}"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Total Spent($)</th>
                                            <th>Checked User</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
    </div>

@endsection

@section('script-part')
    <script>
        $(document).ready(function () {
           $(".select_all").on('click',function () {
               $(".checked_user").prop('checked',true);
           });
           $(".uncheck_all").on('click',function () {
               $(".checked_user").prop('checked',false);
           });
        });
    </script>
    @endsection