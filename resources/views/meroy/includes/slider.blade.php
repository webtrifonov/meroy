<div class="slider">
    <div class="flexslider">
    	<ul class="slides">
    		@forelse($sliders as $slide)
    		<li>
    			<a href="{{url($slide->path)}}"><img src="
@if (! preg_match('/^(http:\/\/|https:\/\/)?[0-9a-zA-Zа-яА-ЯёЁ]{1,3}+[.][0-9a-zA-Zа-яА-ЯёЁ]+[.][0-9a-zA-Zа-яА-ЯёЁ]{2,6}+/i', $slide->image))
					{{ asset('assets/images/slider/'.$slide->image) }}
							@else
					{{ $slide->image }}
							@endif
							"/></a>
    			<!-- <p class="flex-caption">{{ $slide->title }}</p> -->
    		</li>
    		@empty
    			<p class="empty">Нет слайдов</p>
    		@endforelse
    	</ul>
    </div>				       
</div>