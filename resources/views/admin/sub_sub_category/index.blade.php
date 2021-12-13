@extends('layouts.admin-master')
@section('category')
active show-sub
@endsection

@section('sub-sub-category')
active 
@endsection

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="">Starlight</a>
    <span class="breadcrumb-item active">Sub->Sub Category</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">
     <div class="col-sm-8">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">All Sub->Sub Categories</h6>


        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Category Name</th>
                <th class="wd-15p">Sub Category Name</th>
                <th class="wd-15p">Sub->Sub Category Name(En)</th>
                <th class="wd-15p">Sub->SUb Category Name(Bn)</th>
                <th class="wd-20p">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($sub_sub_category as $sub_sub_category)
              <tr>
                <td>{{$sub_sub_category->category->category_name_en}}</td>
                <td>{{$sub_sub_category->sub_category->sub_category_name_en}}</td>
                <td>{{$sub_sub_category->sub_sub_category_name_en}}</td> 
                <td>{{$sub_sub_category->sub_sub_category_name_bn}}</td>
                <td>
                  <a href="{{route('edit.sub.sub.category',$sub_sub_category->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                  <a href="{{route('delete.sub.sub.category',$sub_sub_category->id)}}"  id="delete-confirm" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fas fa-dumpster"></i></a>

                </td>


              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-sm-4">

     <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Add New Sub Sub Category</h6>
      
      <form method="POST" action="{{route('add.sub.sub.category')}}" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
         <label >Select One Category</label>
         <select class="form-control select2-show-search" id="category" name="category_id" data-placeholder="Select One Category">
          <option label="Select One Category"></option>
          @foreach($category as $category)
          <option value="{{$category->id}}">{{ucwords($category->category_name_en)}}</option>
          @endforeach

        </select>
        @error('category_id')
        <li><span class="text-danger">{{$message}}</span></li>
        @enderror

      </div>
      <div class="form-group">
       <label >Select One Sub Category</label>
       <select class="form-control select2-show-search" name="sub_category_id" data-placeholder="Select One Category">
        <option label="Select One Sub Category"></option>
      </select>
      @error('sub_category_id')
      <li><span class="text-danger">{{$message}}</span></li>
      @enderror

    </div>
    <div class="form-group">
      <label >Sub->Sub Category Name(English)</label>
      <input type="text" class="form-control" name="sub_sub_category_name_en" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">

      @error('sub_sub_category_name_en')
      <li><span class="text-danger">{{$message}}</span></li>
      @enderror

    </div>
    <div class="form-group">
      <label >Sub->Sub Category Name(Bangla)</label>
      <input type="text" class="form-control" name="sub_sub_category_name_bn" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
      @error('sub_category_name_bn')
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('select[name="category_id"]').on('change',function(){
     const category_id= $(this).val();
     if(category_id){

       $.ajax({

        url:"{{url('/admin/sub_category/ajax')}}/"+category_id,
        type:"GET",
        dataType:"json",
        success:function(data){

          if(data.length>0){
           
           let d=$('select[name="sub_category_id"]').empty();

           $.each(data,function(key,value){
          
           $('select[name="sub_category_id"]').append('<option value="'+value.id+'">'+value.sub_category_name_en+'</option>');
           

           });
         }
         else{
          let d=$('select[name="sub_category_id"]').empty();
          $('select[name="sub_category_id"]').html('<option label="No Sub Category Available"></option>');
         }

        },



       });

     }




   });


  });
</script>

@endsection



