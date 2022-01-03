@extends('layouts.admin-master')
@section('shipping_area')
active show-sub
@endsection

@section('add-district')
active 
@endsection

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">District</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">

      <div class="col-sm-8 mx-auto">

       <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update District</h6>

         <form method="POST" action="{{route('update.district')}}">
        @csrf
  <div class="form-group">
          <label >Division Name</label> <br>
          <select class="form-control" aria-label="Default select example" name="shipping_division_id">

            @foreach($division as $division)
            <option value="{{$division->id}}" {{$division->id==$district->shipping_division_id? 'selected':''}}>{{$division->division_name}}</option>
            @endforeach
            
          </select>
          @error('shipping_division_id')
          <li><span class="text-danger">{{$message}}</span></li>
          @enderror
        </div>     
        <div class="form-group">
          <label >District Name</label>
          <input type="text" class="form-control" value="{{$district->district_name}}" name="district_name"  placeholder="Enter Name">
          @error('district_name')
          <li><span class="text-danger">{{$message}}</span></li>
          @enderror
        </div>


      
  <input type="hidden" name="district_id" value="{{$district->id}}">
  <button type="submit" class="btn btn-primary">Update</button>
</form>


      </div>
    </div>

  </div>

</div>
</div>

@endsection