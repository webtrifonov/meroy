<div class="slider">	
<!-- <style type="text/css">
.flex-caption {
  width: 96%;
  padding: 2%;
  left: 0;
  bottom: 0;
  background: rgba(0,0,0,.5);
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0,0,0,.3);
  font-size: 14px;
  line-height: 18px;
}
</style> -->
<div class="flexslider">
	<ul class="slides">
		@forelse($sliders as $slide)
		<li>
			<a href="{{url($slide->path)}}"><img src="{{ $slide->image }}" /></a>
			<!-- <p class="flex-caption">{{ $slide->title }}</p> -->
		</li>
		@empty
			<li></li>
		@endforelse
	</ul>
</div>
	<div class="clear"></div>					       
</div>