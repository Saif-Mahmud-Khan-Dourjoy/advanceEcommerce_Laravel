@extends('layouts.frontend-master')

@section('frontend_content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content my-5" >
    <div class="container">
       <div class="sign-in-page">
          <div class="row">
              <div class="col-sm-6">

                <div class="card" style="width: 18rem;">
                   <img src="{{asset(Auth::user()->image)}}" class="card-img-top mx-auto"  width="180px" alt="...">
                   <ul class="list-group list-group-flush">
                    <a href="{{route('user.dashboard')}}" class="btn btn-success btn-block font-weight-bold" href="{{url('/')}}">Home</a>
                    <a class="btn btn-info btn-block font-weight-bold" href="{{route('image.change.view')}}">Change Image</a>
                    <a class="btn btn-warning btn-block font-weight-bold" href="{{route('password.change.view')}}">Change Password</a>
                    <a class="btn btn-danger btn-block font-weight-bold" href="{{ route('logout') }}"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" ><i class="icon ion-power"></i> Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
                
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <h4 class="card-title text-info">Hi... <span class="text-danger"> {{Auth::user()->name}}   </span>   Welcome to Edit Your Profile</h4> 
                <div class="card-body">
                    
                   <form class="register-form outer-top-xs" role="form" method="POST" action="{{route('update.profile')}}">
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" name="email" value="{{Auth::user()->email}}"  autocomplete="email" placeholder="Enter Email" >
                        @error('email')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
                        
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                        <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="name" value="{{Auth::user()->name}}"  autocomplete="name" autofocus placeholder="Enter Name" >
                        @error('name')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                        <input type="text" name="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Phone Number" value="{{Auth::user()->phone}}" >
                        @error('phone')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
                    </div>
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>
@endsection