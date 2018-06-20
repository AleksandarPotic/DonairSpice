@section('title', 'Donair Spice | Reset Password')

@extends('user.layouts.master')

@section('content')


    <!--// Personal Information Part -->
    <div class="container text-center" style="margin-top: 180px">
        <form action="{{ route('password.request') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3" id="personal-info">
                    <h1>Reset Password</h1><br>
                    @if(count($errors) >0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-warning" style="background-color: #d3a713; color: black;">
                                <strong>Error!</strong> {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" value="{{ $email or old('email') }}" aria-describedby="emailHelp" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" aria-describedby="emailHelp" placeholder="Enter New Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" aria-describedby="emailHelp" placeholder="Confirm New Password " required>
                    </div>
                </div>
            </div>
            <div class="row" id="submit">
                <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                    <button type="submit" class="btn btn-default"><b>CHANGE PASSWORD</b></button>
                </div>
            </div>
        </form>
    </div> <!--// End Personal Information -->



    @endsection