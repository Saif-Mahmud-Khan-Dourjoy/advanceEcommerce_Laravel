@extends('layouts.admin-master')
@section('coupon')
active
@endsection

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Coupon</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">

      <div class="col-sm-8 mx-auto">

       <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Coupon</h6>

         <form method="POST" action="{{route('update.coupon')}}">
        @csrf
  <div class="form-group">
    <label >Coupon Name</label>
    <input type="text" class="form-control" value="{{$coupon->coupon_name}}" name="coupon_name"  placeholder="Enter Name">
     @error('coupon_name')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
  </div>
<div class="form-group">
    <label >Coupon Discount</label>
    <input type="number" class="form-control" value="{{$coupon->coupon_discount}}" name="coupon_discount"  placeholder="Enter Discount" min="1" max="99">
    @error('coupon_discount')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
  </div>
  <div class="form-group">
    <label >Coupon Validity</label>
    <input type="date" class="form-control" value="{{$coupon->coupon_validity}}" name="coupon_validity" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" >
    @error('coupon_validity')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
  </div>
  <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
  <button type="submit" class="btn btn-primary">Update</button>
</form>


      </div>
    </div>

  </div>

</div>
</div>

@endsection