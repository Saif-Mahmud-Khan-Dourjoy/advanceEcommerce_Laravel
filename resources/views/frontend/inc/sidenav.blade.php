			<div class="side-menu animate-dropdown outer-bottom-xs">
					<div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
					<nav class="yamm megamenu-horizontal" role="navigation">
						<ul class="nav">
							@php                                        
							$category=App\Models\Category::latest()->get();                         @endphp
							@foreach($category as $cat)
							<li class="dropdown menu-item">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>@if(session()->get('language')=='english'){{$cat->category_name_en}}
									@else
									{{$cat->category_name_bn}}
								@endif</a>
								<ul class="dropdown-menu mega-menu">
									<li class="yamm-content">
										<div class="row">
											@php                                        
											$sub_category=App\Models\SubCategory::where('category_id',$cat->id)->latest()->get(); 
											@endphp
											@foreach($sub_category as $s_cat)
											<div class="col-sm-12 col-md-3">
												<a href="{{route('sub.category.product',$s_cat->id)}}"><h2 class="title">@if(session()->get('language')=='english'){{$s_cat->sub_category_name_en}}
													@else
													{{$s_cat->sub_category_name_bn}}
													@endif
												</h2></a>
												<ul class="links list-unstyled">
													@php                                        
													$sub_sub_category=App\Models\SubSubCategory::where('sub_category_id',$s_cat->id)->latest()->get(); 
													@endphp
													@foreach($sub_sub_category as $s_s_cat)  
													<li><a href="{{route('sub.sub.category.product',$s_s_cat->id)}}">@if(session()->get('language')=='english'){{$s_s_cat->sub_sub_category_name_en}}
														@else
														{{$s_s_cat->sub_sub_category_name_bn}}
													@endif</a></li>
													@endforeach

												</ul>
											</div><!-- /.col -->
											@endforeach
											<!-- /.col -->
										</div><!-- /.row -->
									</li><!-- /.yamm-content -->                    
								</ul><!-- /.dropdown-menu -->            </li>
								@endforeach<!-- /.menu-item -->



								<!-- /.menu-item -->

							</ul><!-- /.nav -->
						</nav><!-- /.megamenu-horizontal -->
					</div>