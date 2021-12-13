@extends('layouts.admin-master')
@section('slider')
active
@endsection

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Slider</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">

      <div class="col-sm-8 mx-auto">

       <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Slider</h6>

        <form method="POST" action="{{route('update.slider')}}" enctype='multipart/form-data'>
          @csrf
          <input type="hidden" name="id" value="{{$slider->id}}">
          @if($slider->slider_title_en == NULL)
          
          @else
          <div class="form-group">
            <label >Slider Title(English)</label>
            <input type="text" class="form-control" value="{{$slider->slider_title_en}}" name="slider_title_en"  placeholder="Enter Title">

          </div>
          @endif
          @if($slider->slider_title_bn == NULL)
          
          @else
          <div class="form-group">
            <label >Slider Title(Bangla)</label>
            <input type="text" class="form-control" value="{{$slider->slider_title_bn}}" name="slider_title_bn"  placeholder="Enter Title">

          </div>
          @endif
          @if($slider->slider_desc_en == NULL)
          
          @else
          <div class="form-group">
            <label >Slider Desc(English)</label>
            <input type="text" class="form-control" value="{{$slider->slider_desc_en}}" name="slider_desc_en"  placeholder="Enter Desc">

          </div>
          @endif
          @if($slider->slider_desc_bn == NULL)
          
          @else
          <div class="form-group">
            <label >Slider Desc(Bangla)</label>
            <input type="text" class="form-control" value="{{$slider->slider_desc_bn}}" name="slider_desc_bn"  placeholder="Enter Desc">

          </div>
          @endif


          <div class="form-group">
            <label >Slider Image</label>
            <br>
            <span class="text-info mb-3">Old Image : <img height="50px" src="{{asset($slider->slider_image)}}"></span>
            <input type="hidden" name="old_image" value="{{$slider->slider_image}}">
            <input type="file" class="form-control" name="slider_image"  id="exampleInputEmail1" aria-describedby="emailHelp" >
        
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>


      </div>
    </div>

  </div>

</div>
</div>

@endsection