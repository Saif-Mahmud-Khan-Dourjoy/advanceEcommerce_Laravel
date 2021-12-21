@extends('layouts.frontend-master')

@section('frontend_content')
@php
function bn_price($rep){
	$en=array(1,2,3,4,5,6,7,8,9,0);
	$bn=array("১","২","৩","৪","৫","৬","৭","৮","৯","০");
	$rep=str_replace($en, $bn, $rep);

	return $rep;
}


@endphp

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Category</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row'>
			<div class='col-md-3 sidebar'>
				<!-- ================================== TOP NAVIGATION ================================== -->

				@include('frontend.inc.sidenav')
				<!-- /.side-menu -->
				<!-- ================================== TOP NAVIGATION : END ================================== -->	            <div class="sidebar-module-container">

					<div class="sidebar-filter">
						<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
						@include('frontend.inc.shopByCat')<!-- /.sidebar-widget -->
						<!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

						<!-- ============================================== PRICE SILDER============================================== -->
						<div class="sidebar-widget wow fadeInUp">
							<div class="widget-header">
								<h4 class="widget-title">Price Slider</h4>
							</div>
							<div class="sidebar-widget-body m-t-10">
								<div class="price-range-holder">
									<span class="min-max">
										<span class="pull-left">$200.00</span>
										<span class="pull-right">$800.00</span>
									</span>
									<input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">

									<input type="text" class="price-slider" value="" >

								</div><!-- /.price-range-holder -->
								<a href="#" class="lnk btn btn-primary">Show Now</a>
							</div><!-- /.sidebar-widget-body -->
						</div><!-- /.sidebar-widget -->
						
						
						@include('frontend.inc.product_tag')<!-- /.sidebar-widget -->

						<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
							<div id="advertisement" class="advertisement">
								<div class="item">
									<div class="avatar"><img src="{{asset('frontend')}}/assets/images/testimonials/member1.png" alt="Image"></div>
									<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
									<div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
								</div><!-- /.item -->

								<div class="item">
									<div class="avatar"><img src="{{asset('frontend')}}/assets/images/testimonials/member3.png" alt="Image"></div>
									<div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
									<div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>    
								</div><!-- /.item -->

								<div class="item">
									<div class="avatar"><img src="{{asset('frontend')}}/assets/images/testimonials/member2.png" alt="Image"></div>
									<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
									<div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
								</div><!-- /.item -->

							</div><!-- /.owl-carousel -->
						</div>

						<!-- ============================================== Testimonials: END ============================================== -->

						{{-- <div class="home-banner">
							<img src="{{asset('frontend')}}/assets/images/banners/LHS-banner.jpg" alt="Image">
						</div>  --}}

					</div><!-- /.sidebar-filter -->
				</div><!-- /.sidebar-module-container -->
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
				<!-- ========================================== SECTION – HERO ========================================= -->

				




				<!-- ========================================= SECTION – HERO : END ========================================= -->
				<div class="clearfix filters-container m-t-10">
					<div class="row">
						<div class="col col-sm-6 col-md-2">
							<div class="filter-tabs">
								<ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
									<li class="active">
										<a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
									</li>
									<li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
								</ul>
							</div><!-- /.filter-tabs -->
						</div><!-- /.col -->
						<div class="col col-sm-12 col-md-6">
							<div class="col col-sm-3 col-md-6 no-padding">
								<div class="lbl-cnt">
									<span class="lbl">Sort by</span>
									<div class="fld inline">
										<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
											<button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
												Position <span class="caret"></span>
											</button>

											<ul role="menu" class="dropdown-menu">
												<li role="presentation"><a href="#">position</a></li>
												<li role="presentation"><a href="#">Price:Lowest first</a></li>
												<li role="presentation"><a href="#">Price:HIghest first</a></li>
												<li role="presentation"><a href="#">Product Name:A to Z</a></li>
											</ul>
										</div>
									</div><!-- /.fld -->
								</div><!-- /.lbl-cnt -->
							</div><!-- /.col -->
							<div class="col col-sm-3 col-md-6 no-padding">
								<div class="lbl-cnt">
									<span class="lbl">Show</span>
									<div class="fld inline">
										<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
											<button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
												1 <span class="caret"></span>
											</button>

											<ul role="menu" class="dropdown-menu">
												<li role="presentation"><a href="#">1</a></li>
												<li role="presentation"><a href="#">2</a></li>
												<li role="presentation"><a href="#">3</a></li>
												<li role="presentation"><a href="#">4</a></li>
												<li role="presentation"><a href="#">5</a></li>
												<li role="presentation"><a href="#">6</a></li>
												<li role="presentation"><a href="#">7</a></li>
												<li role="presentation"><a href="#">8</a></li>
												<li role="presentation"><a href="#">9</a></li>
												<li role="presentation"><a href="#">10</a></li>
											</ul>
										</div>
									</div><!-- /.fld -->
								</div><!-- /.lbl-cnt -->
							</div><!-- /.col -->
						</div><!-- /.col -->
						<div class="col col-sm-6 col-md-4 text-right">
							<div class="pagination-container">
								{{$products->links()}}
							</div><!-- /.pagination-container -->		</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
					<div class="search-result-container ">
						<div id="myTabContent" class="tab-content category-list">
							<div class="tab-pane active " id="grid-container">
								<div class="category-product">
									<div class="row">	

										@foreach($products as $product)

										<div class="col-sm-6 col-md-4 wow fadeInUp">
											<div class="products">

												<div class="product">		
													<div class="product-image">
														<div class="image">
															<a href=""><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
														</div><!-- /.image -->			

														<div class="tag new"><span>
															@if($product->discount_price == NULL)@if(session()->get('language')=='english') New
															@else
															নতুন
															@endif
															@else
															@php

															$amount=$product->selling_price-$product->discount_price;
															$discount=($amount/$product->selling_price) * 100;

															@endphp@if(session()->get('language')=='english') 
															{{round($discount)}}%
															@else
															{{bn_price(round($discount))}}%
															@endif
															@endif


														</span></div>

													</div><!-- /.product-image -->


													<div class="product-info text-left">
														<h3 class="name">@if(session()->get('language')== 'english')
															<a href="{{url('single_product/'.$product->id.'/'.$product->product_slug_en)}}">

																@else
																<a href="{{url('single_product/'.$product->id.'/'.$product->product_slug_bn)}}">
																	@endif 


																	@if(session()->get('language')=='english'){{$product->product_name_en}}@else {{$product->product_name_bn}} @endif</a></h3>
																	<div class="rating rateit-small"></div>
																	<div class="description"></div>

																	<div class="product-price">	
																		@if($product->discount_price == NULL)
																		@if(session()->get('language')=='english') {{$product->selling_price}}
																		@else
																		{{bn_price($product->selling_price)}}
																		@endif

																		@else
																		<span class="price">
																			@if(session()->get('language')=='english') {{$product->discount_price}}
																			@else
																			{{bn_price($product->discount_price)}}
																			@endif
																		</span>
																		<span class="price-before-discount">
																			@if(session()->get('language')=='english') {{$product->selling_price}}
																			@else
																			{{bn_price($product->selling_price)}}
																			@endif 

																		</span>@endif
																	</div><!-- /.product-price -->

																</div><!-- /.product-info -->
																<div class="cart clearfix animate-effect">
																	<div class="action">
																		<ul class="list-unstyled">
																			<li class="add-cart-button btn-group">
																				<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																					<i class="fa fa-shopping-cart"></i>													
																				</button>
																				<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

																			</li>

																			<li class="lnk wishlist">
																				<a class="add-to-cart" href="detail.html" title="Wishlist">
																					<i class="icon fa fa-heart"></i>
																				</a>
																			</li>

																			<li class="lnk">
																				<a class="add-to-cart" href="detail.html" title="Compare">
																					<i class="fa fa-signal"></i>
																				</a>
																			</li>
																		</ul>
																	</div><!-- /.action -->
																</div><!-- /.cart -->
															</div><!-- /.product -->

														</div><!-- /.products -->
													</div>
													<!-- /.item -->
													@endforeach
													<!-- /.item -->
												</div>
												<!-- /.row -->
											</div><!-- /.category-product -->

										</div><!-- /.tab-pane -->

										<div class="tab-pane "  id="list-container">
											<div class="category-product">
												
												@foreach($products as $product)	

												<div class="category-product-inner wow fadeInUp">		
													<div class="products">				
														<div class="product-list product">
															<div class="row product-list-row">
																<div class="col col-sm-4 col-lg-4">
																	<div class="product-image">
																		<div class="image">
																			<img src="{{asset($product->product_thumbnail)}}" alt="">
																		</div>
																	</div><!-- /.product-image -->
																</div><!-- /.col -->
																<div class="col col-sm-8 col-lg-8">
																	<div class="product-info">
																		<h3 class="name">@if(session()->get('language')== 'english')
															<a href="{{url('single_product/'.$product->id.'/'.$product->product_slug_en)}}">

																@else
																<a href="{{url('single_product/'.$product->id.'/'.$product->product_slug_bn)}}">
																	@endif 


																	@if(session()->get('language')=='english'){{$product->product_name_en}}@else {{$product->product_name_bn}} @endif</a></h3>
																		<div class="rating rateit-small"></div>
																		<div class="product-price">	
																			@if($product->discount_price == NULL)
																		@if(session()->get('language')=='english') {{$product->selling_price}}
																		@else
																		{{bn_price($product->selling_price)}}
																		@endif

																		@else
																		<span class="price">
																			@if(session()->get('language')=='english') {{$product->discount_price}}
																			@else
																			{{bn_price($product->discount_price)}}
																			@endif
																		</span>
																		<span class="price-before-discount">
																			@if(session()->get('language')=='english') {{$product->selling_price}}
																			@else
																			{{bn_price($product->selling_price)}}
																			@endif 

																		</span>@endif

																		</div><!-- /.product-price -->
																		<div class="description m-t-10">@if(session()->get('language')=='english') {!!$product->long_descp_en!!}
																			@else
																			{!!$product->long_descp_bn!!}
																			@endif</div>
																		<div class="cart clearfix animate-effect">
																			<div class="action">
																				<ul class="list-unstyled">
																					<li class="add-cart-button btn-group">
																						<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																							<i class="fa fa-shopping-cart"></i>													
																						</button>
																						<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

																					</li>

																					<li class="lnk wishlist">
																						<a class="add-to-cart" href="detail.html" title="Wishlist">
																							<i class="icon fa fa-heart"></i>
																						</a>
																					</li>

																					<li class="lnk">
																						<a class="add-to-cart" href="detail.html" title="Compare">
																							<i class="fa fa-signal"></i>
																						</a>
																					</li>
																				</ul>
																			</div><!-- /.action -->
																		</div><!-- /.cart -->

																	</div><!-- /.product-info -->	
																</div><!-- /.col -->
															</div><!-- /.product-list-row -->
															<div class="tag new"><span>@if($product->discount_price == NULL)@if(session()->get('language')=='english') New
															@else
															নতুন
															@endif
															@else
															@php

															$amount=$product->selling_price-$product->discount_price;
															$discount=($amount/$product->selling_price) * 100;

															@endphp@if(session()->get('language')=='english') 
															{{round($discount)}}%
															@else
															{{bn_price(round($discount))}}%
															@endif
															@endif</span></div>        </div><!-- /.product-list -->
														</div><!-- /.products -->
													</div><!-- /.category-product-inner -->
													@endforeach


												</div><!-- /.category-product -->
											</div><!-- /.tab-pane #list-container -->
										</div>
										<div class="clearfix filters-container">

											<div class="text-right">
												<div class="pagination-container">

													{{ $products->links() }}
												</div>
                                               
												<!-- /.pagination-container -->						    </div><!-- /.text-right -->

											</div><!-- /.filters-container -->

										</div><!-- /.search-result-container -->

									</div><!-- /.col -->
								</div><!-- /.row -->
								@endsection