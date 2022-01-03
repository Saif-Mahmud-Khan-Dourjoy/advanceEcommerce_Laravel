<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="author" content="">
	<meta name="keywords" content="MediaCenter, Template, eCommerce">
	<meta name="robots" content="all">

	<title>@yield('title')</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">

	<!-- Customizable CSS -->
	<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/main.css">
	<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/blue.css">
	<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl.transitions.css">
	<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/animate.min.css">
	<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/rateit.css">
	<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap-select.min.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />




	<!-- Icons/Glyphs -->
	<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/font-awesome.css">

	<!-- Fonts --> 
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


</head>
<body class="cnt-home">
	


	
	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">

		<!-- ============================================== TOP MENU ============================================== -->
		<div class="top-bar animate-dropdown">
			<div class="container">
				<div class="header-top-inner">
					<div class="cnt-account">
						<ul class="list-unstyled">
							<li><a href="#"><i class="icon fa fa-user"></i>@if(session()->get('language')=='english') My Account @else আমার Account @endif </a></li>
							<li><a href="{{route('wishlist')}}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
							<li><a href="{{route('my.cart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
							<li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
							@auth
							<li><a href="
								@if(Auth::user()->role_id==1)
								{{route('admin.dashboard')}}
								@else
								{{route('user.dashboard')}}
								@endif
								"><i class="icon fa fa-lock"></i>{{Auth::user()->name}}</a></li>
								{{-- <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
								document.getElementById('logout-form').submit();" ><i class="icon ion-power"></i> Sign Out</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</li> --}}
							@else
							<li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Login / Register</a></li>
							@endauth

						</ul>
					</div><!-- /.cnt-account -->

					<div class="cnt-block">
						<ul class="list-unstyled list-inline">
							<li class="dropdown dropdown-small">
								<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">USD</a></li>
									<li><a href="#">INR</a></li>
									<li><a href="#">GBP</a></li>
								</ul>
							</li>

							<li class="dropdown dropdown-small">
								<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">@if(session()->get('language')=='english')
									English
									@else
									বাংলা
								@endif </span><b class="caret"></b></a>
								<ul class="dropdown-menu">
									@if(session()->get('language')=='bangla')
									<li><a href="{{route('english.language')}}">English</a></li>
									@else
									<li><a href="{{route('bangla.language')}}">বাংলা</a></li>
									@endif

								</ul>
							</li>
						</ul><!-- /.list-unstyled -->
					</div><!-- /.cnt-cart -->
					<div class="clearfix"></div>
				</div><!-- /.header-top-inner -->
			</div><!-- /.container -->
		</div><!-- /.header-top -->
		<!-- ============================================== TOP MENU : END ============================================== -->
		<div class="main-header">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
						<!-- ============================================================= LOGO ============================================================= -->
						<div class="logo">
							<a href="{{url('/')}}">

								<img src="{{asset('frontend')}}/assets/images/logo.png" alt="">

							</a>
						</div><!-- /.logo -->
						<!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

						<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
							<!-- /.contact-row -->
							<!-- ============================================================= SEARCH AREA ============================================================= -->
							<div class="search-area">
								<form>
									<div class="control-group">

										<ul class="categories-filter animate-dropdown">
											<li class="dropdown">

												<a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>

												<ul class="dropdown-menu" role="menu" >
													@php                                        
													$category=App\Models\Category::latest()->get();                         @endphp
													@foreach($category as $cat)
													<li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">@if(session()->get('language')=='english')-{{$cat->category_name_en}}
														@else
														-{{$cat->category_name_bn}}
													@endif</a></li>
													@endforeach	

												</ul>
											</li>
										</ul>

										<input class="search-field" placeholder="Search here..." />

										<a class="search-button" href="#" ></a>    

									</div>
								</form>
							</div><!-- /.search-area -->
							<!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

							<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
								<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

								<div class="dropdown dropdown-cart">
									<a href="#" class="dropdown-toggle lnk-cart miniCart" data-toggle="dropdown">
										<div class="items-cart-inner">
											<div class="basket">
												<i class="glyphicon glyphicon-shopping-cart"></i>
											</div>
											<div class="basket-item-count"><span class="count miniCartCount"></span></div>
											<div class="total-price-basket">
												<span class="lbl">cart -</span>
												<span class="total-price">
													<span class="sign">$</span><span class="value mini_cart_total">600.00</span>
												</span>
											</div>


										</div>
									</a>
									<ul class="dropdown-menu">
										<li>
											<div class="cart-item product-summary" id="miniCartContent">

											</div><!-- /.cart-item -->
											<div class="clearfix"></div>
											

											<div class="clearfix cart-total">
												<div class="pull-right">

													<span class="text">Sub Total :</span><span class='price miniCartTotal'></span>

												</div>
												<div class="clearfix"></div>

												<a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>	
											</div><!-- /.cart-total-->


										</li>
									</ul><!-- /.dropdown-menu-->
								</div><!-- /.dropdown-cart -->

								<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
							</div><!-- /.row -->

						</div><!-- /.container -->

					</div><!-- /.main-header -->

					<!-- ============================================== NAVBAR ============================================== -->
					<div class="header-nav animate-dropdown">
						<div class="container">
							<div class="yamm navbar navbar-default" role="navigation">
								<div class="navbar-header">
									<button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div class="nav-bg-class">
									<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
										<div class="nav-outer">
											<ul class="nav navbar-nav">
												<li class="active dropdown yamm-fw">
													<a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a>

												</li>
												@php                                        
												$category=App\Models\Category::latest()->get();                         @endphp
												@foreach($category as $cat)
												<li class="dropdown yamm mega-menu">
													<a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if(session()->get('language')=='english'){{$cat->category_name_en}}
														@else
														{{$cat->category_name_bn}}
														@endif
													</a>
													<ul class="dropdown-menu container">
														<li>
															<div class="yamm-content ">
																<div class="row">
																	@php                                        
																	$sub_category=App\Models\SubCategory::where('category_id',$cat->id)->latest()->get(); 
																	@endphp
																	@foreach($sub_category as $s_cat)
																	<div class="col-xs-12 col-sm-6 col-md-2 col-menu">
																		<h2 class="title">@if(session()->get('language')=='english'){{$s_cat->sub_category_name_en}}
																			@else
																			{{$s_cat->sub_category_name_bn}}
																			@endif
																		</h2>
																		<ul class="links">
																			@php                                        
																			$sub_sub_category=App\Models\SubSubCategory::where('sub_category_id',$s_cat->id)->latest()->get(); 
																			@endphp
																			@foreach($sub_sub_category as $s_s_cat)
																			<li><a href="#">@if(session()->get('language')=='english'){{$s_s_cat->sub_sub_category_name_en}}
																				@else
																				{{$s_s_cat->sub_sub_category_name_bn}}
																			@endif</a></li>
																			@endforeach		

																		</ul>
																	</div><!-- /.col -->
																	@endforeach


																	{{-- <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
																		<img class="img-responsive" src="{{asset('frontend')}}/assets/images/banners/top-menu-banner.jpg" alt="">






																	</div> --}}<!-- /.yamm-content -->					
																</div>
															</div>

														</li>
													</ul>

												</li>
												@endforeach


												<li class="dropdown  navbar-right special-menu">
													<a href="#">Todays offer</a>
												</li>


											</ul><!-- /.navbar-nav -->
											<div class="clearfix"></div>				
										</div><!-- /.nav-outer -->
									</div><!-- /.navbar-collapse -->


								</div><!-- /.nav-bg-class -->
							</div><!-- /.navbar-default -->
						</div><!-- /.container-class -->

					</div><!-- /.header-nav -->
					<!-- ============================================== NAVBAR : END ============================================== -->

				</header>

				<!-- ============================================== HEADER : END ============================================== -->
				@yield('frontend_content')
				<!-- /#top-banner-and-menu -->
				<div id="brands-carousel" class="logo-slider wow fadeInUp">

					<div class="logo-slider-inner">	
						<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
							<div class="item m-t-15">
								<a href="#" class="image">
									<img data-echo="{{asset('frontend')}}/assets/images/brands/brand1.png" src="{{asset('frontend')}}/assets/images/blank.gif" alt="">
								</a>	
							</div><!--/.item-->

							<div class="item m-t-10">
								<a href="#" class="image">
									<img data-echo="{{asset('frontend')}}/assets/images/brands/brand2.png" src="{{asset('frontend')}}/assets/images/blank.gif" alt="">
								</a>	
							</div><!--/.item-->

							<div class="item">
								<a href="#" class="image">
									<img data-echo="{{asset('frontend')}}/assets/images/brands/brand3.png" src="{{asset('frontend')}}/assets/images/blank.gif" alt="">
								</a>	
							</div><!--/.item-->

							<div class="item">
								<a href="#" class="image">
									<img data-echo="{{asset('frontend')}}/assets/images/brands/brand4.png" src="{{asset('frontend')}}/assets/images/blank.gif" alt="">
								</a>	
							</div><!--/.item-->

							<div class="item">
								<a href="#" class="image">
									<img data-echo="{{asset('frontend')}}/assets/images/brands/brand5.png" src="{{asset('frontend')}}/assets/images/blank.gif" alt="">
								</a>	
							</div><!--/.item-->

							<div class="item">
								<a href="#" class="image">
									<img data-echo="{{asset('frontend')}}/assets/images/brands/brand6.png" src="{{asset('frontend')}}/assets/images/blank.gif" alt="">
								</a>	
							</div><!--/.item-->

							<div class="item">
								<a href="#" class="image">
									<img data-echo="{{asset('frontend')}}/assets/images/brands/brand2.png" src="{{asset('frontend')}}/assets/images/blank.gif" alt="">
								</a>	
							</div><!--/.item-->

							<div class="item">
								<a href="#" class="image">
									<img data-echo="{{asset('frontend')}}/assets/images/brands/brand4.png" src="{{asset('frontend')}}/assets/images/blank.gif" alt="">
								</a>	
							</div><!--/.item-->

							<div class="item">
								<a href="#" class="image">
									<img data-echo="{{asset('frontend')}}/assets/images/brands/brand1.png" src="{{asset('frontend')}}/assets/images/blank.gif" alt="">
								</a>	
							</div><!--/.item-->

							<div class="item">
								<a href="#" class="image">
									<img data-echo="{{asset('frontend')}}/assets/images/brands/brand5.png" src="{{asset('frontend')}}/assets/images/blank.gif" alt="">
								</a>	
							</div><!--/.item-->
						</div><!-- /.owl-carousel #logo-slider -->
					</div><!-- /.logo-slider-inner -->

				</div><!-- /.logo-slider -->
				<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
			</div><!-- /.container -->
		</div>




		<!-- ============================================================= FOOTER ============================================================= -->
		<footer id="footer" class="footer color-bg">


			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading">
								<h4 class="module-title">Contact Us</h4>
							</div><!-- /.module-heading -->

							<div class="module-body">
								<ul class="toggle-footer" style="">
									<li class="media">
										<div class="pull-left">
											<span class="icon fa-stack fa-lg">
												<i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
											</span>
										</div>
										<div class="media-body">
											<p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
										</div>
									</li>

									<li class="media">
										<div class="pull-left">
											<span class="icon fa-stack fa-lg">
												<i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
											</span>
										</div>
										<div class="media-body">
											<p>+(888) 123-4567<br>+(888) 456-7890</p>
										</div>
									</li>

									<li class="media">
										<div class="pull-left">
											<span class="icon fa-stack fa-lg">
												<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
											</span>
										</div>
										<div class="media-body">
											<span><a href="#">flipmart@themesground.com</a></span>
										</div>
									</li>

								</ul>
							</div><!-- /.module-body -->
						</div><!-- /.col -->

						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading">
								<h4 class="module-title">Customer Service</h4>
							</div><!-- /.module-heading -->

							<div class="module-body">
								<ul class='list-unstyled'>
									<li class="first"><a href="#" title="Contact us">My Account</a></li>
									<li><a href="#" title="About us">Order History</a></li>
									<li><a href="#" title="faq">FAQ</a></li>
									<li><a href="#" title="Popular Searches">Specials</a></li>
									<li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
								</ul>
							</div><!-- /.module-body -->
						</div><!-- /.col -->

						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading">
								<h4 class="module-title">Corporation</h4>
							</div><!-- /.module-heading -->

							<div class="module-body">
								<ul class='list-unstyled'>
									<li class="first"><a title="Your Account" href="#">About us</a></li>
									<li><a title="Information" href="#">Customer Service</a></li>
									<li><a title="Addresses" href="#">Company</a></li>
									<li><a title="Addresses" href="#">Investor Relations</a></li>
									<li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
								</ul>
							</div><!-- /.module-body -->
						</div><!-- /.col -->

						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading">
								<h4 class="module-title">Why Choose Us</h4>
							</div><!-- /.module-heading -->

							<div class="module-body">
								<ul class='list-unstyled'>
									<li class="first"><a href="#" title="About us">Shopping Guide</a></li>
									<li><a href="#" title="Blog">Blog</a></li>
									<li><a href="#" title="Company">Company</a></li>
									<li><a href="#" title="Investor Relations">Investor Relations</a></li>
									<li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
								</ul>
							</div><!-- /.module-body -->
						</div>
					</div>
				</div>
			</div>

			<div class="copyright-bar">
				<div class="container">
					<div class="col-xs-12 col-sm-6 no-padding social">
						<ul class="link">
							<li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
							<li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
							<li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
							<li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
							<li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
							<li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
							<li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-6 no-padding">
						<div class="clearfix payment-methods">
							<ul>
								<li><img src="{{asset('frontend')}}/assets/images/payments/1.png" alt=""></li>
								<li><img src="{{asset('frontend')}}/assets/images/payments/2.png" alt=""></li>
								<li><img src="{{asset('frontend')}}/assets/images/payments/3.png" alt=""></li>
								<li><img src="{{asset('frontend')}}/assets/images/payments/4.png" alt=""></li>
								<li><img src="{{asset('frontend')}}/assets/images/payments/5.png" alt=""></li>
							</ul>
						</div><!-- /.payment-methods -->
					</div>
				</div>
			</div>
		</footer>
		<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="proName"></h5>
						<button type="button" class="close" data-dismiss="modal" id="closeModal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-4">
								<img src="" class="img-fluid" id="proImg" height="200px" width="200px">
							</div>
							<div class="col-md-4">
								<ul class="list-group">
									<li class="list-group-item" >Price : <strong class="text-danger"> <span id="proPrice"></span> </strong>  <span><del id="prePrice"></del></span></li>
									<li class="list-group-item" >Code : <span id="proCode"></span></li>
									<li class="list-group-item" >Brand : <span id="proBrand"></span></li>
									<li class="list-group-item" >Category : <span id="proCategory"></span></li>
									<li class="list-group-item">Stock : <span class="text-success" id="proStock"> </span> <span id="proNotStock" class="text-danger"> </span> </li>
								</ul>
							</div>
							<div class="col-md-4">
								<label>Select Color :</label> <br>
								<select class="form-control" id="proColor" name="color">


								</select>
								<br>
								<div id="showSize">
									<label>Select Size :</label> <br>
									<select class="form-control" id="proSize" name="size">

									</select>
								</div>
								<br>
								<input type="hidden" id="product_id" name="product_id">
								{{-- <input type="hidden" id="product_name" name="product_name"> --}}
								<label>Quantity :</label> <br>
								<input class="form-control" type="number" id="qty" name="qty" value="1">
								<br>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" onclick="addToCart()" class="btn btn-info">Add To Cart</button>


							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- ============================================================= FOOTER : END============================================================= -->


		<!-- For demo purposes – can be removed on production -->


		<!-- For demo purposes – can be removed on production : End -->

		<!-- JavaScripts placed at the end of the document so the pages load faster -->
		<script src="{{asset('frontend')}}/assets/js/jquery-1.11.1.min.js"></script>

		<script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>

		<script src="{{asset('frontend')}}/assets/js/bootstrap-hover-dropdown.min.js"></script>
		<script src="{{asset('frontend')}}/assets/js/owl.carousel.min.js"></script>

		<script src="{{asset('frontend')}}/assets/js/echo.min.js"></script>
		<script src="{{asset('frontend')}}/assets/js/jquery.easing-1.3.min.js"></script>
		<script src="{{asset('frontend')}}/assets/js/bootstrap-slider.min.js"></script>
		<script src="{{asset('frontend')}}/assets/js/jquery.rateit.min.js"></script>
		<script type="text/javascript" src="{{asset('frontend')}}/assets/js/lightbox.min.js"></script>
		<script src="{{asset('frontend')}}/assets/js/bootstrap-select.min.js"></script>
		<script src="{{asset('frontend')}}/assets/js/wow.min.js"></script>
		<script src="{{asset('frontend')}}/assets/js/scripts.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
		<script>
			@if(Session::has('message'))
			var type = "{{ Session::get('alert-type', 'info') }}";
			switch(type){
				case 'info':
				toastr.info("{{ Session::get('message') }}");
				break;

				case 'warning':
				toastr.warning("{{ Session::get('message') }}");
				break;

				case 'success':
				toastr.success("{{ Session::get('message') }}");
				break;

				case 'error':
				toastr.error("{{ Session::get('message') }}");
				break;
			}
			@endif
		</script>

		<script type="text/javascript">
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			function getID(id) {


				$.ajax({
					type: "GET",
					url: "product/details/addTocart/"+id,
					dataType: 'json',

					success: function(data){

						
						$('#proImg').attr('src',data.product.product_thumbnail);
						$('#product_id').val(id);


						if(data.product.product_qty > 0){
							$('#proNotStock').text('');
							$('#proStock').text('Available');
						}
						else{
							$('#proStock').text('');
							$('#proNotStock').text('Out Of Stock');
						}



						var session='<?php echo session()->get('language');?>';

						if(session=='english'){
							$('#proCode').text(data.product.product_code);
							$('#proName').text(data.product.product_name_en);
							$('#proBrand').text(data.product.brand.brand_name_en);
							$('#proCategory').text(data.product.category.category_name_en);
							$('#proColor').text('');
							$.each(data.color_en,function(key,value){
								$('#proColor').append('<option value="'+value+'">'+value+'</option>');
							});

							if(data.size_en == ''){
								$('#showSize').hide();
							}
							else{
								$('#showSize').show();
								$('select[name="size"]').text('');
								$.each(data.size_en,function(key,value){
									$('select[name="size"]').append('<option value="'+value+'">'+value+'</option>');
								});
							}

							if(data.product.discount_price == null ){
								$('#proPrice').text('');
								$('#prePrice').text('');
								$('#proPrice').text('$'+data.product.selling_price);
							}
							else{
								$('#proPrice').text('');
								$('#prePrice').text('');
								$('#proPrice').text('$'+data.product.discount_price);
								$('#prePrice').text('$'+data.product.selling_price);

							}


						}else{
							$('#proCode').text(bn_number(data.product.product_code));
							$('#proName').text(data.product.product_name_bn);
							$('#proBrand').text(data.product.brand.brand_name_bn);
							$('#proCategory').text(data.product.category.category_name_bn);
							$('#proColor').text('');
							$.each(data.color_bn,function(key,value){
								$('#proColor').append('<option value="'+value+'">'+value+'</option>');
							});
							if(data.size_bn == ''){
								$('#showSize').hide();
							}
							else{
								$('#showSize').show();
								$('select[name="size"]').text('');
								$.each(data.size_bn,function(key,value){
									$('select[name="size"]').append('<option value="'+value+'">'+value+'</option>');
								});
							}

							function bn_number(number) {

								var s= number;
								var arr=[];
								arr[1]="১";
								arr[2]="২";
								arr[3]="৩";
								arr[4]="৪";
								arr[5]="৫";
								arr[6]="৬";
								arr[7]="৭";
								arr[8]="৮";
								arr[9]="৯";
								arr[0]="০";
								var ban_num="";	
								for(var i=0;i<s.length;i++){

									ban_num+=arr[s[i]];
								}
								
								return ban_num;
								
							}
							
							
							




							if(data.product.discount_price == null ){
								$('#proPrice').text('');
								$('#prePrice').text('');
								$('#proPrice').text('$'+bn_number(data.product.selling_price));
							}
							else{
								$('#proPrice').text('');
								$('#prePrice').text('');
								$('#proPrice').text('$'+bn_number(data.product.discount_price));
								$('#prePrice').text('$'+bn_number(data.product.selling_price));

							}


						}

					},
					error: function (error) {

					}
				});


			}

			
			function addToCart(){


				var product_id=$('#product_id').val();
				var color= $('#proColor option:selected').text();
				var size= $('#proSize option:selected').text();
				var proName= $('#proName').text();
				var qty= $('#qty').val();



				

				$.ajax({
					type: "POST",
					dataType: 'json',
					data:{
						color:color,
						size:size,
						proName:proName,
						qty:qty
					},
					url: "cart/data/store/"+product_id,

					success:function(data){
						miniCart();
						$('#closeModal').click();
						if(data=='success'){
							Swal.fire({
								position: 'top-end',
								icon: 'success',
								title: 'Successfully Added',
								showConfirmButton: false,
								timer: 1500
							})
						}else{
							Swal.fire({
								position: 'top-end',
								icon: 'error',
								title: 'Please Login First',
								showConfirmButton: false,
								timer: 1500
							})
						}
						


					},
					error:function(error){

					}

				});


				
			}



			

			function miniCart(){

				$.ajax({
					type: "GET",
					dataType: 'json',
					url: "cart/data/read",

					success:function(data){
						
						var output="";
						$.each(data.cartContent,function(index,value){

							output +=`<div class="row"><div class="col-xs-4"><div class="image"><a href="#"><img src="${value.options.image}" alt=""></a></div></div><div class="col-xs-7"><h3 class="name"><a href="#">${value.name}</a></h3><div class="price">${value.price}$ * ${value.qty} </div></div><div class="col-xs-1 action"><button id="${value.rowId}" type="submit" onclick="miniCartRemoveItem(this.id)"><i class="fa fa-trash"></i></button></div></div><hr>`;


						});
						
						$('#miniCartContent').html(output);
						$('.miniCartTotal').html('$'+data.cartTotal);
						$('.miniCartCount').html(data.cartCount);
						$('.mini_cart_total').html(data.cartTotal);


					},
					error:function(error){

					}

				});

			}
			miniCart();

     /////======RemoveItemMiniCart======//////

     function miniCartRemoveItem(rowId){

     	$.ajax({
     		type: "GET",
     		dataType: 'json',
     		url: "cart/data/remove/"+rowId,

     		success:function(data){

     			miniCart();
     			my_cart();


     			if(data=='success'){
     				Swal.fire({
     					position: 'top-end',
     					icon: 'success',
     					title: 'Successfully Deleted',
     					showConfirmButton: false,
     					timer: 1500
     				})
     			}else{
     				Swal.fire({
     					position: 'top-end',
     					icon: 'error',
     					title: 'Something Went Wrong',
     					showConfirmButton: false,
     					timer: 1500
     				})
     			}








     		},
     		error:function(error){

     		}

     	});

     	
     }


     /////======////////

     ////====MyCart=====////

      function my_cart(){

     	$.ajax({
     		type: "GET",
     		dataType: 'json',
     		url: "my_cart/data/read",

     		success:function(data){
     			console.log(data);
     			var output="";
     			$.each(data.cartContent,function(index,value){

     				output +=`<tr>
     				<td class="col-md-2"><img src="${value.options.image}" alt="imga"></td>
     				<td class="col-md-2">
     				<div class="product-name"><a href="#">${value.name}</a></div>

     				<div class="price">
     				$ ${value.price}


     				</div>
     				</td>
     				<td class="col-md-2">${value.options.color}</td>
     				<td class="col-md-2">${value.options.size==null? `Product Size`: `${value.options.size}` }</td>
     				<td class="col-md-2">$ ${value.price} * ${value.qty} = ${value.subtotal}</td>
     				<td class="col-md-2">
     				   ${value.qty==1? `<button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="decrementCartItem(this.id)" disabled>-</button>` : `<button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="decrementCartItem(this.id)" >-</button>` }
                        
                        <input value="${value.qty}"    style="width:30px"  disabled>
                        <button class="btn btn-danger btn-sm " id="${value.rowId}" onclick="incrementCartItem(this.id)">+</button>

     				</td>
     				<td class="col-md-1 close-btn">
     				<a href="#" class="" id="${value.rowId}" onclick="miniCartRemoveItem(this.id)"><i class="fa fa-times"></i></a>
     				</td>
     				</tr>`;


     			});

     			$('#my_cart').html(output);



     		},
     		error:function(error){

     		}

     	});

     }
     my_cart();





     ////======///////
    ///=====Increment and Decrement Cart Item =======//////

    function decrementCartItem(rowId){
    	$.ajax({
     		type: "GET",
     		dataType: 'json',
     		url: "cart/item/decrement/"+rowId,

     		success:function(data){
             my_cart();
             miniCart();
           

     		},
     		error:function(error){

     		}

     	});
    }

    function incrementCartItem(rowId){
    	$.ajax({
     		type: "GET",
     		dataType: 'json',
     		url: "cart/item/increment/"+rowId,

     		success:function(data){
             my_cart();
             miniCart();

           

     		},
     		error:function(error){

     		}

     	});
    }


    ///===========//////

     /////=====addToWishlist======////

     function addToWishList(product_id){

     	$.ajax({
     		type: "GET",
     		dataType: 'json',
     		url: "wishlist/data/store/"+product_id,

     		success:function(data){

     			if(data.msg=='success'){
     				Swal.fire({
     					position: 'top-end',
     					icon: 'success',
     					title: 'Successfully Added',
     					showConfirmButton: false,
     					timer: 1500
     				})
     			}else if(data.msg=='already has'){
     				Swal.fire({
     					position: 'top-end',
     					icon: 'error',
     					title: 'Already Added',
     					showConfirmButton: false,
     					timer: 1500
     				})

     			}
     			else{
     				Swal.fire({
     					position: 'top-end',
     					icon: 'error',
     					title: 'Please Login First',
     					showConfirmButton: false,
     					timer: 1500
     				})
     			}



     		},
     		error:function(error){

     		}

     	});

     }


     //////========//////

     //////===show wishlist====/////
     
     function wishlist(){

     	$.ajax({
     		type: "GET",
     		dataType: 'json',
     		url: "wishlist/data/read",

     		success:function(data){
     			var output="";
     			$.each(data.wishlist,function(index,value){

     				output +=`<tr>
     				<td class="col-md-2"><img src="${value.product.product_thumbnail}" alt="imga"></td>
     				<td class="col-md-7">
     				<div class="product-name"><a href="#">${value.product.product_name_en}</a></div>

     				<div class="price">
     				${value.product.discount_price == null ? `$ ${value.product.selling_price}`: `$ ${value.product.discount_price} <span>$ ${value.product.selling_price}</span>`  }


     				</div>
     				</td>
     				<td class="col-md-2">
     				<button class="btn-upper btn btn-primary" data-toggle="modal" data-target="#productModal" type="button" id="${value.product.id}" onclick="getID(this.id)"> Add To Cart

     				</button>
     				
     				</td>
     				<td class="col-md-1 close-btn">
     				<a href="#" class="" id="${value.id}" onclick="removeWishlist(this.id)"><i class="fa fa-times"></i></a>
     				</td>
     				</tr>`;


     			});

     			$('#wishlist').html(output);



     		},
     		error:function(error){

     		}

     	});

     }
     wishlist();

     //===//
     
     ////=====RemoveWishlist======/////

    function removeWishlist(id){

    	$.ajax({
     		type: "GET",
     		dataType: 'json',
     		url: "wishlist/data/remove/"+id,

     		success:function(data){
             wishlist();
             const Toast = Swal.mixin({
             	toast:true,
             	position: 'top-end',
             	showConfirmButton:false,
             	timer:3000
             })

             if($.isEmptyObject(data.error)){
             	Toast.fire({
                    type:'success',
                    title:data.success
             		})
             	}else{
             		Toast.fire({
                    type:'error',
                    title:data.error
             		})
             	}
             
     			
     		},
     		error:function(error){

     		}

     	});

     	
     }

    
     


     ////======////


 </script>




</body>

</html> 