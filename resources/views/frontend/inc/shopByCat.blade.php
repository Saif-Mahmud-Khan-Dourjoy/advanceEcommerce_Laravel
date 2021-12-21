<div class="sidebar-widget wow fadeInUp">
							<h3 class="section-title">shop by</h3>
							<div class="widget-header">
								<h4 class="widget-title">Category</h4>
							</div>
							<div class="sidebar-widget-body">
								<div class="accordion">
									@php                                        
									$category=App\Models\Category::latest()->get();                         @endphp
									@foreach($category as $cat)
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse{{$cat->id}}" data-toggle="collapse" class="accordion-toggle collapsed">
												@if(session()->get('language')=='english'){{$cat->category_name_en}}
												@else
												{{$cat->category_name_bn}}
												@endif
											</a>
										</div>
										<!-- /.accordion-heading -->
										<div class="accordion-body collapse" id="collapse{{$cat->id}}" style="height: 0px;">
											<div class="accordion-inner">
												<ul>
													@php                                        
													$sub_category=App\Models\SubCategory::where('category_id',$cat->id)->latest()->get(); 
													@endphp
													@foreach($sub_category as $s_cat)
													<li><a href="{{route('sub.category.product',$s_cat->id)}}">@if(session()->get('language')=='english'){{$s_cat->sub_category_name_en}}
														@else
														{{$s_cat->sub_category_name_bn}}
													@endif</a></li>
													@endforeach
													
												</ul>
											</div><!-- /.accordion-inner -->
										</div><!-- /.accordion-body -->
									</div><!-- /.accordion-group -->
									@endforeach

								</div><!-- /.accordion -->
							</div><!-- /.sidebar-widget-body -->
						</div>