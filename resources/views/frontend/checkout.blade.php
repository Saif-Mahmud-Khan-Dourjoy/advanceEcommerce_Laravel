
@extends('layouts.frontend-master')

@section('frontend_content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div>

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<form class="register-form" role="form" action="{{route('user.checkout.store')}}" method="POST">
				@csrf
				<div class="row">
					<div class="col-md-8">
						<div class="panel-group checkout-steps" id="accordion">
							<!-- checkout-step-01  -->
							<div class="panel panel-default checkout-step-01">

								<div class="panel-collapse collapse in">

									<!-- panel-body  -->
									<div class="panel-body">
										<div class="row">		


											<!-- guest-login -->

											<!-- already-registered-login -->
											
											<div class="col-md-6 col-sm-6 already-registered-login">


												<div class="form-group">
													<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label> <br>
													<input type="email" name="email" value="{{Auth::user()->email}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" data-validation="required">
												</div>
												<div class="form-group">
													<label class="info-title" for="exampleInputEmail1">Name <span>*</span></label> <br>
													<input type="text" value="{{Auth::user()->name}}" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" data-validation="required">
												</div>
												<div class="form-group">
													<label class="info-title" for="exampleInputEmail1">Phone <span>*</span></label> <br>
													<input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" data-validation="required">
												</div>
												<div class="form-group">
													<label class="info-title"  class="form-control unicase-form-control text-input" for="exampleInputEmail1">Note </label> <br>
													<textarea class="form-control" rows="5" id="comment" name="note"></textarea>
												</div>
												
												

											</div>

											<div class="col-md-6 col-sm-6 already-registered-login">


												<div class="form-group">
													<label class="info-title"  for="exampleInputEmail1">Division <span>*</span></label> <br>
													<select  class="form-control" aria-label="Default select example" id="division" data-validation="required" name="division" aria-label="Default select example">
														<option >Select One</option>
														@foreach($division as $item)

														<option value="{{$item->id}}">{{$item->division_name}}</option>

														@endforeach
														
													</select>
												</div>
												<div class="form-group">
													<label class="info-title" for="exampleInputEmail1">Division <span>*</span></label> <br>
													<select class="form-control" data-validation="required" class="form-control" name="district" aria-label="Default select example">
														<option >Select One</option>
														
													</select>
												</div>
												<div class="form-group">
													<label class="info-title" for="exampleInputEmail1">Division <span>*</span></label> <br>
													<select class="form-control" data-validation="required" class="form-control" name="state" aria-label="Default select example">
														<option >Select One</option>
														
													</select>
												</div>
												<div class="form-group">
													<label class="info-title" class="form-control" for="exampleInputEmail1">Postal Code <span>*</span></label> <br>
													<input type="text" data-validation="required" name="postal_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
												</div>
												
												

											</div>

											<!-- already-registered-login -->		

										</div>			
									</div>
									<!-- panel-body  -->

								</div><!-- row -->
							</div>


						</div><!-- /.checkout-steps -->
					</div>
					<div class="col-md-4">
						<!-- checkout-progress-sidebar -->
						<div class="checkout-progress-sidebar ">
							<div class="panel-group">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
									</div>
									<div class="">
										<ul class="nav nav-checkout-progress list-unstyled">
											@foreach($cartContent as $item)
											<li>
												<strong>Image : </strong>
												<img src="{{asset($item->options->image)}}" height="50px" width="50px">

												<strong>Qty : </strong>
												{{$item->qty}}

												<strong>Color : </strong>
												{{$item->options->color}}

												<strong>Size : </strong>
												{{$item->options->size}}

												<hr>

											</li>
											@endforeach
											@if(Session::has('coupon'))
											<li>
												<strong>SubTotal : </strong>
												{{$cartTotal}}

											</li>
											<li>
												<strong>Coupon Name : </strong>

												{{session()->get('coupon')['coupon_name']}}
											</li>
											<li>
												<strong>Coupon Discount  : </strong>

												{{session()->get('coupon')['discount_amount']}} ({{session()->get('coupon')['coupon_discount']}})
											</li>
											<li>
												<strong>Grand Total  : </strong>

												{{session()->get('coupon')['total_amount']}} 
											</li>
											@else

											<li>
												<strong>GrandTotal : </strong>
												{{$cartTotal}}
											</li>

											@endif
										</ul>		
									</div>
								</div>
							</div>
						</div> 
						<hr>
						<div>
							<div class="panel-heading">

								<div class="checkout-progress-sidebar ">
									<div class="panel-group">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="unicase-checkout-title">Your Payment Type</h4>
											</div>

											<div class="">
												<ul class="nav nav-checkout-progress list-unstyled">

													<li>
														<input type="radio" checked class=""  name="payment_method" value="stripe" >
														<label class="" for="">Stripe</label>
													</li>
													<li>
														<input type="radio" class=""  name="payment_method" value="card" >
														<label class="" for="">Card</label>
													</li>
													<li>
														<input type="radio" class=""  name="payment_method" value="cod" >
														<label class="" for="">COD</label>
													</li>

												</ul>





											</div>

											<div>
												<button type="submit" class="btn btn-success">Payment Step</button>
											</div>


										</div>
									</div>
								</div>




							</div>
						</div>					
					</div>
				</div><!-- /.row -->
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript">

			$('select[name="division"]').on('change',function(){
				let division_id= $(this).val();

				if(division_id){



					$.ajax({

						url:"{{url('/user/district-get/ajax')}}/"+division_id,
						type:"GET",
						dataType:"json",
						success:function(data){
							
							$('select[name="state"]').html(" ");
							if(data.length>0){

								let d=$('select[name="district"]').empty();

								$.each(data,function(key,value){

									$('select[name="district"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');


								});
							}
							else{
								let d=$('select[name="district"]').empty();
								$('select[name="district"]').html('<option label="No District Available"></option>');
							}

						},



					});

				}
			});




			$('select[name="district"]').on('change',function(){
				let district_id= $(this).val();

				if(district_id){



					$.ajax({

						url:"{{url('/user/state-get/ajax')}}/"+district_id,
						type:"GET",
						dataType:"json",
						success:function(data){
							
						
							if(data.length>0){

								let d=$('select[name="state"]').empty();

								$.each(data,function(key,value){

									$('select[name="state"]').append('<option value="'+value.id+'">'+value.state_name+'</option>');


								});
							}
							else{
								let d=$('select[name="state"]').empty();
								$('select[name="state"]').html('<option label="No State Available"></option>');
							}

						},



					});

				}
			});
		</script>

		@endsection