@extends('layouts.admin-master')
@section('active')
active
@endsection

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Category</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">

      <div class="col-sm-8 mx-auto">

       <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Category</h6>

        <form method="POST" action="{{route('update.category')}}" enctype='multipart/form-data'>
          @csrf
          <div class="form-group">
            <input type="hidden" name="id" value="{{$category_update_data->id}}">
            <label >Category Name(English)</label>
            <input type="text" class="form-control" name="category_name_en" id="exampleInputEmail1" value="{{$category_update_data->category_name_en}}" aria-describedby="emailHelp" placeholder="Enter Name">
            @error('category_name_en')
            <li><span class="text-danger">{{$message}}</span></li>
            @enderror
          </div>
          <div class="form-group">
            <label >Category Name(Bangla)</label>
            <input type="text" class="form-control" value="{{$category_update_data->category_name_bn}}"  name="category_name_bn" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            @error('category_name_bn')
            <li><span class="text-danger">{{$message}}</span></li>
            @enderror
          </div>

          <div class="form-group">
            <label >Category Icon</label>
            <input type="text" class="form-control" name="category_icon" value="{{$category_update_data->category_icon}}"  id="exampleInputEmail1" aria-describedby="emailHelp" >
            @error('category_icon')
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