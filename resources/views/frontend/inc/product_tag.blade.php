<div class="sidebar-widget product-tag wow fadeInUp">
	<h3 class="section-title">Product tags</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="tag-list">	
		@if(session()->get('language')=='english')
		  @foreach($final_tag_en_arr as $item)
          <a class="item active" title="Phone" href="{{route('tag.product',$item)}}">{{$item}}</a>
          @endforeach
		@else
		 @foreach($final_tag_bn_arr as $item)
          <a class="item active" title="Phone" href="{{route('tag.product',$item)}}">{{$item}}</a>
          @endforeach
		@endif				
			

		</div><!-- /.tag-list -->
	</div><!-- /.sidebar-widget-body -->
</div>