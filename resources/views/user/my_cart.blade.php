@extends('layouts.frontend-master')

@section('frontend_content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>My Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<td class="font-weight-bold text-danger" >Image</td  >
									<td class="font-weight-bold text-danger" >Product</td  >
									<td class="font-weight-bold text-danger" >Color</td  >
									<td class="font-weight-bold text-danger" >Size</td  >
									<td class="font-weight-bold text-danger" >Subtotal</td  >
									<td class="font-weight-bold text-danger" >Qty</td  >
									<td class="font-weight-bold text-danger" >Del</td  >
								</tr>
							</thead>
							<tbody id="my_cart">
								


							</tbody>
						</table>
					</div>






				</div>			
			</div><!-- /.row -->
			<div class="col-md-6 col-sm-12 estimate-ship-tax">
				@if(Session::has('coupon'))

				@else
				<table class="table" id="apply_coupon">
					<thead>
						<tr>
							<th>
								<span class="estimate-title">Discount Code</span>
								<p>Enter your coupon code if you have one..</p>
							</th>
						</tr>
					</thead>
					<tbody >
						<tr>
							<td>
								<div class="form-group">
									<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." id="coupon_name">
								</div>
								<div class="clearfix pull-right">
									<button type="submit" onclick="applyCoupon()" class="btn-upper btn btn-primary">APPLY COUPON</button>
								</div>
							</td>
						</tr>
					</tbody><!-- /tbody -->
				</table><!-- /table -->
				@endif
			</div><!-- /.estimate-ship-tax -->

			<div class="col-md-6 col-sm-12 cart-shopping-total">
				<table class="table">
					<thead id="couponCalField">
						
					</thead><!-- /thead -->
					<tbody>
						<tr>
							<td>
								<div class="cart-checkout-btn pull-right">
									<a href="{{route('user.checkout')}}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
									{{-- <span class="">Checkout with multiples address!</span> --}}
								</div>
							</td>
						</tr>
					</tbody><!-- /tbody -->
				</table><!-- /table -->
			</div>
		</div>
	</div>
</div>



@endsection
