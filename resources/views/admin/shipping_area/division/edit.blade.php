@extends('layouts.admin-master')
@section('shipping_area')
active show-sub
@endsection

@section('add-division')
active 
@endsection

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Division</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">

      <div class="col-sm-8 mx-auto">

       <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Division</h6>

         <form method="POST" action="{{route('update.division')}}">
        @csrf
  <div class="form-group">
    <label >Division Name</label>
    <input type="text" class="form-control" value="{{$division->division_name}}" name="division_name"  placeholder="Enter Name">
     @error('division_name')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
  </div>

  <input type="hidden" name="division_id" value="{{$division->id}}">
  <button type="submit" class="btn btn-primary">Update</button>
</form>


      </div>
    </div>

  </div>

</div>
</div>

@endsection