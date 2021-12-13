@extends('layouts.admin-master')

@section('admin_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Image Update</span>
      </nav>



<div class="body-content my-5" >
    <div class="container">
       <div class="sign-in-page">
          <div class="row mx-auto">
              <div class="col-sm-4">

                <div class="card" style="width: 18rem;">
                   <img src="{{asset(Auth::user()->image)}}" class="card-img-top mx-auto rounded-circle"  width="180px" height="180px" alt="...">
                   <ul class="list-group list-group-flush">
                    <a href="{{route('admin.dashboard')}}" class="btn btn-success btn-block font-weight-bold" href="">Home</a>
                    <a class="btn btn-info btn-block font-weight-bold" href="{{route('admin.image.change.view')}}">Change Image</a>
                    <a class="btn btn-warning btn-block font-weight-bold" href="{{route('admin.password.change.view')}}">Change Password</a>
                    <a class="btn btn-danger btn-block font-weight-bold" href="{{ route('logout') }}"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" ><i class="icon ion-power"></i> Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
                
            </div>
        </div>
      <div class="col-sm-8">
        <div class="card">
            <h4 class="card-title text-info">Hi... <span class="text-danger"> {{Auth::user()->name}}   </span>   Update Your Image</h4> 
            <div class="card-body">

               <form class="register-form outer-top-xs" role="form" method="POST" action="{{route('admin.image.update')}}" enctype='multipart/form-data' >
                @csrf
                <div class="form-group">
                    <input type="hidden" name="old_image" value="{{Auth()->user()->image}}">
                    <label class="info-title" for="exampleInputEmail2">Your Image <span>*</span></label>
                    <input type="file" class="form-control unicase-form-control text-input"  name="image">
                    @error('image')
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
</div>
@endsection