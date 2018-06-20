@extends('admin.layouts.app')

@section('Admins','active')
@section('body-part')

    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Admins</h3>
                            <br>
                            <a href="{{ route('admins.create') }}"><button class="btn btn-flat btn-success">New</button></a>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                <a href="{{ route('admins.edit',$admin->id) }}">
                                                    <button class="btn btn-flat btn-block btn-warning"><span class="fa fa-edit"></span></button>
                                                </a>
                                            </td>
                                            <td>
                                                <form id="delete-form-{{ $admin->id }}" method="POST" action="{{ route('admins.destroy',$admin->id) }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="" onclick="if(confirm('Do you really want to delete this admin?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $admin->id }}').submit();
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
                                        <th>Name</th>
                                        <th>Email</th>
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