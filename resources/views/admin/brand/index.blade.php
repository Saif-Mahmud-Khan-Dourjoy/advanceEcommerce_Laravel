@extends('layouts.admin-master')
@section('brand')
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
     <div class="col-sm-8">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">All Brands</h6>
       

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Image</th>
                <th class="wd-15p">Brand Name(En)</th>
                <th class="wd-15p">Brand Name(Bn)</th>
                <th class="wd-20p">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($brand as $brand)
              <tr>
                <td><img src="{{asset($brand->image)}}" height="50px"></td>
                <td>{{$brand->brand_name_en}}</td> 
                <td>{{$brand->brand_name_bn}}</td>
                <td>
                  <a href="{{route('edit.brand',$brand->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                  <a href="{{route('delete.brand',$brand->id)}}"  id="delete-confirm" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fas fa-dumpster"></i></a>

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
      <h6 class="card-body-title">Add New Brand</h6>
      
      <form method="POST" action="{{route('add.brand')}}" enctype='multipart/form-data'>
        @csrf
  <div class="form-group">
    <label >Brand Name(English)</label>
    <input type="text" class="form-control" name="brand_name_en" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
     @error('brand_name_en')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
  </div>
<div class="form-group">
    <label >Brand Name(Bangla)</label>
    <input type="text" class="form-control" name="brand_name_bn" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
    @error('brand_name_bn')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
  </div>

  <div class="form-group">
    <label >Brand Image</label>
    <input type="file" class="form-control" name="image"  id="exampleInputEmail1" aria-describedby="emailHelp" >
    @error('image')
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