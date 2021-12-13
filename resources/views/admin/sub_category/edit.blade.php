@extends('layouts.admin-master')
@section('category')
active show-sub
@endsection

@section('sub-category')
active 
@endsection

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Sub Category</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">

      <div class="col-sm-8 mx-auto">

       <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Sub Category</h6>

        <form method="POST" action="{{route('update.sub.category')}}" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
         <label >Select One Category</label>
         <select class="form-control select2-show-search" name="category_id" data-placeholder="Select One Category">
          <option label="Select One Category"></option>
          @foreach($category as $category)
          <option value="{{$category->id}}" {{$category->id==$sub_category->category_id ? 'selected':''}} >{{ucwords($category->category_name_en)}}</option>
          @endforeach

        </select>
        @error('category_id')
        <li><span class="text-danger">{{$message}}</span></li>
        @enderror

      </div>
      <div class="form-group">
        <label >Sub Category Name(English)</label>
        <input type="text" class="form-control" value="{{$sub_category->sub_category_name_en}}" name="sub_category_name_en" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">

        @error('sub_category_name_en')
        <li><span class="text-danger">{{$message}}</span></li>
        @enderror

      </div>
      <div class="form-group">
        <label >Sub Category Name(Bangla)</label>
        <input type="text" class="form-control" value="{{$sub_category->sub_category_name_bn}}" name="sub_category_name_bn" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        @error('sub_category_name_bn')
        <li><span class="text-danger">{{$message}}</span></li>
        @enderror
      </div>
      <input type="hidden" name="sub_cat_id" value="{{$sub_category->id}}">
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>


      </div>
    </div>

  </div>

</div>
</div>

@endsection