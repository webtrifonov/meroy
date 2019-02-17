<div class="content_top">
	<div class="back-links">
		<p><a href="{{ route('index') }}">Главная</a> >> <a href="{{ url('category/'.$product->category->alias) }}">{{ $product->category->title }}</a> >> <a href="#">{{$product->title}}</a></p>
	</div>
	<div class="clear"></div>
</div>