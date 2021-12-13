@extends('layouts.admin-master')
@section('product')
active show-sub
@endsection

@section('manage-product')
active 
@endsection

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Product</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">
     <div class="col-sm-12 mx-auto">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">All Product</h6>
       

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-5p">Image</th>
                <th class="wd-15p"> Name(En)</th>
                <th class="wd-15p"> Name(Bn)</th>
                <th class="wd-10p"> Qty</th>
                <th class="wd-10p"> Sellin Price</th>
                <th class="wd-10p"> Discount</th>
                <th class="wd-10p">Status</th>
                
                <th class="wd-15p">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($product as $product)
              <tr>
                <td><img src="{{asset($product->product_thumbnail)}}" height="60px"></td>
                <td>{{$product->product_name_en}}</td> 
                <td>{{$product->product_name_bn}}</td>
                <td>{{$product->product_qty}}</td>
                <td>{{$product->selling_price}}</td>
                <td>
                  @if($product->discount_price == NULL)
                  <span class="dadge badge-pill badge-danger">No</span>
                 
                  @else
                     @php
                   
                     $amount=$product->selling_price-$product->discount_price;
                     $discount=($amount/$product->selling_price) * 100;
                     
                  @endphp
                     <span class="dadge badge-pill badge-danger">{{round($discount)}} %</span>
                  @endif


                </td>
                <td>
                  @if($product->status==1)
                   
                    <span class="dadge badge-pill badge-success">Active</span>

   
                  @else
                     <span class="dadge badge-pill badge-danger">Inactive</span>
                  @endif
                </td>
                
                <td>
                  <a href="{{route('edit.product',$product->id)}}" title="edit" class="btn btn-primary"><i class="fas fa-pencil-alt fa-sm"></i></a>
                  <a href="{{route('delete.product',$product->id)}}"  id="delete-confirm" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fas fa-dumpster"></i></a>
                  @if($product->status==1)
                  <a href="{{route('active.product.status',$product->id)}}" title="make inactive" class="btn btn-info"><i class="fas fa-arrow-down"></i></a>

                  @else
                   <a href="{{route('inactive.product.status',$product->id)}}" title="make active" class="btn btn-warning"><i class="fas fa-arrow-up"></i></a>

                  @endif
                  

                </td>

    
              </tr>
              @endforeach

            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div>
    </div>


</div>

</div>
</div>

@endsection