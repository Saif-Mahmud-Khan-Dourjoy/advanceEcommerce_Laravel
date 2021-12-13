@extends('layouts.admin-master')
@section('product')
active show-sub
@endsection

@section('add-product')
active 
@endsection

@section('admin_content')
<div class="sl-mainpanel">
	<nav class="breadcrumb sl-breadcrumb">
		<a class="breadcrumb-item" href="#">Starlight</a>
		<a class="breadcrumb-item" href="#">Product</a>

	</nav>

	<div class="sl-pagebody">
		<div class="sl-page-title">

		</div><!-- sl-page-title -->

		<div class="card pd-20 pd-sm-40">

			<form method="POST" action="{{route('add.product')}}" enctype="multipart/form-data">
				@csrf  
				<div class="form-layout">
					<div class="row mg-b-25">
						<div class="col-lg-4">
							<div class="form-group">
								<label >Select One Brand</label>
								<select class="form-control select2-show-search" id="brand" name="brand_id" data-placeholder="Select One Brand">
									<option label="Select One Brand"></option>
									@foreach($brand as $brand)
									<option value="{{$brand->id}}">{{ucwords($brand->brand_name_en)}}</option>
									@endforeach

								</select>
								@error('brand_id')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div><!-- col-4 -->
						<div class="col-lg-4">
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

						</div><!-- col-4 -->
						<div class="col-lg-4">
							<div class="form-group">
								<label >Select One Sub Category</label>
								<select class="form-control select2-show-search" id="sub_category" name="sub_category_id" data-placeholder="Select One Sub Category">
									<option label="Select One Sub Category"></option>
									

								</select>
								@error('sub_category_id')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div><!-- col-4 -->
						<div class="col-lg-4">
							<div class="form-group">
								<label >Select One Sub Sub Category</label>
								<select class="form-control select2-show-search" id="sub_sub_category" name="sub_sub_category_id" data-placeholder="Select One Sub Sub Category">
									<option label="Select One Sub Sub Category"></option>
									

								</select>
								@error('sub_sub_category_id')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Product Name(English)</label>
								<input type="text" class="form-control" name="product_name_en" id="exampleInputEmail1" aria-describedby="emailHelp" >

								@error('product_name_en')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Product Name(Bangla)</label>
								<input type="text" class="form-control" name="product_name_bn" id="exampleInputEmail1" aria-describedby="emailHelp" >

								@error('product_name_bn')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Product Code</label>
								<input type="text" class="form-control" name="product_code" id="exampleInputEmail1" aria-describedby="emailHelp" >

								@error('product_code')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Product Quantity</label>
								<input type="text" class="form-control" name="product_qty" id="exampleInputEmail1" aria-describedby="emailHelp" >

								@error('product_qty')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Product Tags English</label>
								<input type="text" class="form-control" name="product_tags_en" id="exampleInputEmail1" aria-describedby="emailHelp" data-role="tagsinput" >

								@error('product_tags_en')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Product Tags Bangla</label>
								<input type="text" class="form-control" name="product_tags_bn" id="exampleInputEmail1" aria-describedby="emailHelp" data-role="tagsinput">

								@error('product_tags_bn')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Product Size English</label>
								<input type="text" class="form-control" name="product_size_en" id="exampleInputEmail1" aria-describedby="emailHelp" data-role="tagsinput">

								@error('product_size_en')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Product Size Bangla</label>
								<input type="text" class="form-control" name="product_size_bn" id="exampleInputEmail1" aria-describedby="emailHelp" data-role="tagsinput">

								@error('product_size_bn')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Product Color English</label>
								<input type="text" class="form-control" name="product_color_en" id="exampleInputEmail1" aria-describedby="emailHelp" data-role="tagsinput">

								@error('product_color_en')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Product Color Bangla</label>
								<input type="text" class="form-control" name="product_color_bn" id="exampleInputEmail1" aria-describedby="emailHelp" data-role="tagsinput">

								@error('product_color_bn')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Product Selling Price</label>
								<input type="text" class="form-control" name="selling_price" id="exampleInputEmail1" aria-describedby="emailHelp" >

								@error('selling_price')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>

						<div class="col-lg-4">
							<div class="form-group">
								<label >Product Discount Price</label>
								<input type="text" class="form-control" name="discount_price" id="exampleInputEmail1" aria-describedby="emailHelp" >

								@error('discount_price')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Main Thumbnail</label>
								<input type="file" class="form-control" name="product_thumbnail" id="product_thumbnail" aria-describedby="emailHelp" onchange="mainThumb(this)" >

								@error('product_thumbnail')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
							{{-- <img src="" id="main_thumb"> --}}
							<div class="row" id="preview_image1">
								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label >Multiple Image</label>
								<input type="file" class="form-control" name="photo_name[]" id="photo_name" aria-describedby="emailHelp" multiple >

								@error('photo_name')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
							<div class="row" id="preview_image">
								
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="form-group">
								<label >Short Description English</label>
								{{-- <input type="text" class="form-control" name="short_descp_en" id="exampleInputEmail1" aria-describedby="emailHelp" > --}}
								<textarea class="form-control" name="short_descp_en" >
									
								</textarea>

								@error('short_descp_en')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label >Short Description Bangla</label>
								{{-- <input type="text" class="form-control" name="short_descp_en" id="exampleInputEmail1" aria-describedby="emailHelp" > --}}
								<textarea class="form-control" name="short_descp_bn" >
									
								</textarea>

								@error('short_descp_bn')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label >Long Description English</label>
								{{-- <input type="text" class="form-control" name="long_descp_en" id="exampleInputEmail1" aria-describedby="emailHelp" > --}}
								<textarea class="form-control" name="long_descp_en" >
									
								</textarea>

								@error('long_descp_en')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label >Long Description English</label>
								{{-- <input type="text" class="form-control" name="long_descp_en" id="exampleInputEmail1" aria-describedby="emailHelp" > --}}
								<textarea class="form-control" name="long_descp_bn" >
									
								</textarea>

								@error('long_descp_bn')
								<li><span class="text-danger">{{$message}}</span></li>
								@enderror

							</div>
						</div>
						<br>
						<br>
						<div class="col-lg-4">
							
							<label class="ckbox">
								<input type="checkbox" name="hot_deals"  id="hot_deals">
								<span class="font-weight-bold">Hot Deals</span>
							</label>

							
						</div>
						<div class="col-lg-4">
							
							<label class="ckbox">
								<input type="checkbox" name="featured"  id="featured">
								<span class="font-weight-bold">Featured</span>
							</label>

							
						</div>
						<div class="col-lg-4">
							
							<label class="ckbox">
								<input type="checkbox" name="special_offer"  id="special_offer">
								<span class="font-weight-bold">Special Offer</span>
							</label>

							
						</div>
						<div class="col-lg-4">
							
							<label class="ckbox">
								<input type="checkbox" name="special_deals"  id="special_deals">
								<span class="font-weight-bold">Special Deals</span>
							</label>

							
						</div>


					</div><!-- row -->
					<div class="row">
						<div class="col-md-2 mx-auto">
							<button class="btn btn-info ">Add Product</button>
						</div>
					</div>
					<!-- form-layout-footer -->
				</div><!-- form-layout -->
			</form> 
		</div><!-- card -->



	</div><!-- sl-pagebody -->

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
           $('select[name="sub_sub_category_id"]').html(" ");
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

		$('select[name="sub_category_id"]').on('change',function(){
			const sub_category_id= $(this).val();
			if(sub_category_id){

				$.ajax({

					url:"{{url('/admin/sub_sub_category/ajax')}}/"+sub_category_id,
					type:"GET",
					dataType:"json",
					success:function(data){

						if(data.length>0){
							
							let d_s=$('select[name="sub_sub_category_id"]').empty();

							$.each(data,function(key,value){
								
								$('select[name="sub_sub_category_id"]').append('<option value="'+value.id+'">'+value.sub_sub_category_name_en+'</option>');
								

							});
						}
						else{
							let d_s=$('select[name="sub_sub_category_id"]').empty();
							$('select[name="sub_sub_category_id"]').html('<option label="No Sub Category Available"></option>');
						}

					},



				});

			}




		});




	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#photo_name').on('change',function(){
         if(window.File && window.FileReader && window.FileList && window.Blob){ //check file api supported browser

         	var data=$(this)[0].files;
         	$.each(data,function(index,file){

         		var name= file.name;
         		var extension=name.substring(name.lastIndexOf('.')+1).toLowerCase();
         		if(extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'gif'){
         			var fRead= new FileReader();
         			fRead.onload=(function(file){
         				return function(e){
         					var img=$('<img>').addClass('thum').attr('src',e.target.result).width(80).height(80);
         					$('#preview_image').append(img);
         				};
         			})(file);
         			fRead.readAsDataURL(file);
         		}
         	});

         	
         }else{
         	alert('Your Browser does not support file API');
         }
         

       });
	});
</script>
<script type="text/javascript">
	
	function mainThumb(e){
		
		if(e.files && e.files[0]){
			
			var name=e.files[0].name;

			var extension=name.substring(name.lastIndexOf('.')+1).toLowerCase();

			if(extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'gif'){
				var reader= new FileReader();
				reader.onload=(function(e){
					var img1=$('<img>').addClass('thum').attr('src',e.target.result).width(80).height(80);
					$('#preview_image1').append(img1);
					
				});
				reader.readAsDataURL(e.files[0]);
			}

		}

	}	
	

</script>


@endsection