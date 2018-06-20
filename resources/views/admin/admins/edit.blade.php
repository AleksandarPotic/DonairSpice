@extends('admin.layouts.app')

@section('Admins','active')
@section('body-part')

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Admin</h3>
                            <br>
                            @include('errors.error')
                            <a href="{{ route('admins.index') }}"><button class="btn btn-flat btn-success">Back</button></a>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('admins.update',$admin->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Admin Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $admin->name }}" id="exampleInputEmail1" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" value="{{ $admin->email }}" id="exampleInputEmail1" placeholder="Enter Email" required>
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