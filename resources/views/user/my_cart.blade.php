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
		</div>
	</div>
</div>


@endsection
