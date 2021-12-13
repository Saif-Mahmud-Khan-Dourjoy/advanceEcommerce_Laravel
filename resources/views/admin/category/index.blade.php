@extends('layouts.admin-master')
@section('category')
active show-sub
@endsection

@section('add-category')
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
     <div class="col-sm-8">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">All Categories</h6>
       

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Icon</th>
                <th class="wd-15p">Category Name(En)</th>
                <th class="wd-15p">Category Name(Bn)</th>
                <th class="wd-20p">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($category as $category)
              <tr>
                <td><span><i class="{{$category->category_icon}} fa-2x"></i></span></td>
                <td>{{$category->category_name_en}}</td> 
                <td>{{$category->category_name_bn}}</td>
                <td>
                  <a href="{{route('edit.category',$category->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                  <a href="{{route('delete.category',$category->id)}}"  id="delete-confirm" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fas fa-dumpster"></i></a>

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
      <h6 class="card-body-title">Add New Category</h6>
      
      <form method="POST" action="{{route('add.category')}}" enctype='multipart/form-data'>
        @csrf
  <div class="form-group">
    <label >Category Name(English)</label>
    <input type="text" class="form-control" name="category_name_en" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
  </div>
<div class="form-group">
    <label >Category Name(Bangla)</label>
    <input type="text" class="form-control" name="category_name_bn" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
    @error('category_name_bn')
                        <li><span class="text-danger">{{$message}}</span></li>
                        @enderror
  </div>

  <div class="form-group">
    <label >Category Icon</label>
    <input type="text" class="form-control" placeholder="Enter Icon" name="category_icon"  id="exampleInputEmail1" aria-describedby="emailHelp" >
    @error('category_icon')
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