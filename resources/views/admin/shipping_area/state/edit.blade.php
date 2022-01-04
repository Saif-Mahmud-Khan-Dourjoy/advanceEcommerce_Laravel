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

        <form method="POST" action="{{route('update.state')}}">
          @csrf
          <div class="form-group">
            <label >Division Name</label> <br>
            <select class="form-control" aria-label="Default select example" name="shipping_division_id">

              @foreach($division as $division)
              <option value="{{$division->id}}" {{$division->id==$state->shipping_division_id? 'selected':''}}>{{$division->division_name}}</option>
              @endforeach

            </select>
            @error('shipping_division_id')
            <li><span class="text-danger">{{$message}}</span></li>
            @enderror
          </div> 
            <div class="form-group">
            <label >District Name</label> <br>
            <select class="form-control" aria-label="Default select example" name="shipping_district_id">

              @foreach($district as $district)
              <option value="{{$district->id}}" {{$district->id==$state->shipping_district_id? 'selected':''}}>{{$district->district_name}}</option>
              @endforeach
              
            </select>
            @error('shipping_district_id')
            <li><span class="text-danger">{{$message}}</span></li>
            @enderror
          </div>     
          <div class="form-group">
            <label >District Name</label>
            <input type="text" class="form-control" value="{{$state->state_name}}" name="state_name"  placeholder="Enter Name">
            @error('state_name')
            <li><span class="text-danger">{{$message}}</span></li>
            @enderror
          </div>



          <input type="hidden" name="state_id" value="{{$state->id}}">
          <button type="submit" class="btn btn-primary">Update</button>
        </form>


      </div>
    </div>

  </div>

</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

   $('select[name="shipping_division_id"]').on('change',function(){
    let id=$(this).val();
    $.ajax({
      type:'GET',
      url:"{{url('/admin/ajax/request/get_district')}}/"+id,

      dataType:"json",
      success:function(data){
        $('select[name="shipping_district_id"]').empty();
        if(data.length>0){
         $.each(data,function(index,value){
           $('select[name="shipping_district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
         });
       }else{
        $('select[name="shipping_district_id"]').append('<option >No Data Found</option>');
       }
      },
      error:function(error){

      }
    })
   })

  });
 


</script>

@endsection