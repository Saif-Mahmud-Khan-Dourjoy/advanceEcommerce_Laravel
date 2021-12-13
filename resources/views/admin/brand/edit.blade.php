@extends('layouts.admin-master')
@section('active')
active
@endsection

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Brand</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">

      <div class="col-sm-8 mx-auto">

       <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Brand</h6>

        <form method="POST" action="{{route('update.brand')}}" enctype='multipart/form-data'>
          @csrf
          <div class="form-group">
            <input type="hidden" name="id" value="{{$brand_update_data->id}}">
            <label >Brand Name(English)</label>
            <input type="text" class="form-control" name="brand_name_en" id="exampleInputEmail1" value="{{$brand_update_data->brand_name_en}}" aria-describedby="emailHelp" placeholder="Enter Name">
            @error('brand_name_en')
            <li><span class="text-danger">{{$message}}</span></li>
            @enderror
          </div>
          <div class="form-group">
            <label >Brand Name(Bangla)</label>
            <input type="text" class="form-control" value="{{$brand_update_data->brand_name_bn}}"  name="brand_name_bn" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            @error('brand_name_bn')
            <li><span class="text-danger">{{$message}}</span></li>
            @enderror
          </div>

          <div class="form-group">
            <label >Brand Image</label>
            <br>
            <span class="text-info mb-3">Old Image : <img height="50px" src="{{asset($brand_update_data->image)}}"></span>
            <input type="hidden" name="old_image" value="{{$brand_update_data->image}}">
            <input type="file" class="form-control" name="image"  id="exampleInputEmail1" aria-describedby="emailHelp" >
            @error('image')
            <li><span class="text-danger">{{$message}}</span></li>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>


      </div>
    </div>

  </div>

</div>
</div>

@endsection