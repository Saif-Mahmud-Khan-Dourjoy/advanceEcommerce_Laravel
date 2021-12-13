@extends('layouts.frontend-master')

@section('frontend_content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Reset Password</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
                <div class="col-md-12 col-sm-6 sign-in mx-auto">
                    <h4 class="">Reset Password</h4>
                  
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Email"  >


                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                 
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                                <a href="{{ route('login') }}" class="forgot-password pull-right btn btn-success">Return To Login</a>
                    </form>                 
                </div>
                <!-- Sign-in -->

                <!-- create a new account -->
                
                <!-- create a new account -->           </div><!-- /.row -->
            </div>
        </div>
    </div>


@endsection
