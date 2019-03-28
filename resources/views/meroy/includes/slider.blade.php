<div class="slider">
    <div class="flexslider">
    	<ul class="slides">
    		@forelse($sliders as $slide)
    		<li>
    			<a href="{{url($slide->path)}}"><img src="{{ $slide->image }}" /></a>
    			<!-- <p class="flex-caption">{{ $slide->title }}</p> -->
    		</li>
    		@empty
    			<li>Нет слайдов</li>
    		@endforelse
    	</ul>
    </div>				       
</div>