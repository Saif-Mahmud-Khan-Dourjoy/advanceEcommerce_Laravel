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
     <div class="col-sm-8">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">All District</h6>


        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="">Division Name</th>
                <th class="">District Name</th>

                <th class="">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($district as $item)
              <tr>
                <td>{{$item->division->division_name}}</td>
                <td>{{$item->district_name}}</td>
                <td>
                  <a href="" class="btn btn-success" title="view"><i class="fas fa-eye"></i></a>
                  <a href="{{route('edit.district',$item->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                  <a href="{{route('delete.district',$item->id)}}"  id="delete-confirm" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fas fa-dumpster"></i></a>


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
      <h6 class="card-body-title">Add New District</h6>
      
      <form method="POST" action="{{route('add.district')}}">
        @csrf
        <div class="form-group">
          <label >Division Name</label> <br>
          <select class="form-control" aria-label="Default select example" name="shipping_division_id">

            @foreach($division as $division)
            <option value="{{$division->id}}">{{$division->division_name}}</option>
            @endforeach
            
          </select>
          @error('shipping_division_id')
          <li><span class="text-danger">{{$message}}</span></li>
          @enderror
        </div>     
        <div class="form-group">
          <label >District Name</label>
          <input type="text" class="form-control" name="district_name"  placeholder="Enter Name">
          @error('district_name')
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