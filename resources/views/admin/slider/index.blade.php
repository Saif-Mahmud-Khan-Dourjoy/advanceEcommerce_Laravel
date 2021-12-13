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
     <div class="col-sm-8">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">All Sliders</h6>
       

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-10p">Image</th>
                <th class="wd-10p">Slider Title(En)</th>
               {{--  <th class="wd-15p">Slider Title(Bn)</th> --}}
                <th class="wd-15p">Slider Description(En)</th>
               {{--  <th class="wd-15p">Slider Description(Bn)</th> --}}
                <th class="wd-15p">Slider Status</th>
                <th class="wd-30p">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($slider as $slider)
              <tr>
                <td><img src="{{asset($slider->slider_image)}}" height="50px" width="50px"></td>
                <td>
                  @if($slider->slider_title_en == NULL)
                    <span class="badge badge-danger badge-pill">Nothing Found</span>  
                    @else 
                    {{$slider->slider_title_en}}
                    @endif
                  </td> 
                    
               {{--  <td>{{$slider->slider_title_bn}}</td>  --}}
                <td>
                   @if($slider->slider_desc_en == NULL)
                    <span class="badge badge-danger badge-pill">Nothing Found</span>  
                    @else 
                    {{$slider->slider_desc_en}}
                  @endif
                </td>
               {{--  <td>{{$slider->slider_desc_bn}}</td> --}}
                <td>
                  @if($slider->status==1)
                   
                    <span class="dadge badge-pill badge-success">Active</span>

   
                  @else
                     <span class="dadge badge-pill badge-danger">Inactive</span>
                  @endif
                </td>
                <td>
                  <a href="" class="btn btn-success" title="view"><i class="fas fa-eye"></i></a>
                  <a href="{{route('edit.slider',$slider->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                  <a href="{{route('delete.slider',$slider->id)}}"  id="delete-confirm" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fas fa-dumpster"></i></a>
                   @if($slider->status==1)
                  <a href="{{route('active.slider.status',$slider->id)}}" title="make inactive" class="btn btn-info"><i class="fas fa-arrow-down"></i></a>

                  @else
                   <a href="{{route('inactive.slider.status',$slider->id)}}" title="make active" class="btn btn-warning"><i class="fas fa-arrow-up"></i></a>

                  @endif

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
      
      <form method="POST" action="{{route('add.slider')}}" enctype='multipart/form-data'>
        @csrf
  <div class="form-group">
    <label >Slider Title(English)</label>
    <input type="text" class="form-control" name="slider_title_en"  placeholder="Enter Title">
    {{--  @error('slider_title_en')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror --}}
  </div>
<div class="form-group">
    <label >Slider Title(Bangla)</label>
    <input type="text" class="form-control" name="slider_title_bn"  placeholder="Enter Title">
    {{-- @error('slider_title_bn')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror --}}
  </div>
  <div class="form-group">
    <label >Slider Desc(English)</label>
    <input type="text" class="form-control" name="slider_desc_en"  placeholder="Enter Desc">
    {{-- @error('slider_desc_en')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror --}}
  </div>
  <div class="form-group">
    <label >Slider Desc(Bangla)</label>
    <input type="text" class="form-control" name="slider_desc_bn"  placeholder="Enter Desc">
    {{-- @error('slider_desc_bn')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror --}}
  </div>

  <div class="form-group">
    <label >Slider Image</label>
    <input type="file" class="form-control" name="slider_image"   >
         @error('slider_image')
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