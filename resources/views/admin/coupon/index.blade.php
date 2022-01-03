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
     <div class="col-sm-8">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">All Coupons</h6>
       

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="">Coupon Name</th>
                <th class="">Coupon Discount</th>
            
                <th class="">Coupon Validity</th>
             
                <th class="">Status</th>
                <th class="">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($coupon as $coupon)
              <tr>
                <td>{{$coupon->coupon_name}}</td>
                <td>
                 {{$coupon->coupon_discount}}%
                <td>
                  {{Carbon\Carbon::parse($coupon->coupon_validity)->format('D , d F Y')}}
                  
                  
                </td>
               {{--  <td>{{$coupon->slider_desc_bn}}</td> --}}
                <td>
                 @if($coupon->coupon_validity >= Carbon\Carbon::now())

                  <span class="badge badge-success badge-pill">Valid</span>

                 @else
                 <span class="badge badge-danger badge-pill">InValid</span>
                 @endif
                </td>
                <td>
                  <a href="" class="btn btn-success" title="view"><i class="fas fa-eye"></i></a>
                  <a href="{{route('edit.coupon',$coupon->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                  <a href="{{route('delete.coupon',$coupon->id)}}"  id="delete-confirm" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fas fa-dumpster"></i></a>
                   

                </td>

    
              </tr>
              @endforeach

            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div>
    </div>

    <div class="col-sm-4">

     <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Add New Slider</h6>
      
      <form method="POST" action="{{route('add.coupon')}}">
        @csrf
  <div class="form-group">
    <label >Coupon Name</label>
    <input type="text" class="form-control" name="coupon_name"  placeholder="Enter Name">
     @error('coupon_name')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
  </div>
<div class="form-group">
    <label >Coupon Discount</label>
    <input type="number" class="form-control" name="coupon_discount"  placeholder="Enter Discount" min="1" max="99">
    @error('coupon_discount')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
  </div>
  <div class="form-group">
    <label >Coupon Validity</label>
    <input type="date" class="form-control" name="coupon_validity" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" >
    @error('coupon_validity')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


    </div>
  </div>

</div>

</div>
</div>

@endsection