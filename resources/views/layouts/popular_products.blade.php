<div class="content_bottom">
	<div class="heading">
		<h3>Популярные товары</h3>
	</div>
	<div class="see">
		<p><a href="#">Смотреть всё</a></p>
	</div>
	<div class="clear"></div>
</div>
<div class="section group">
	@forelse($demo_popular_products->chunk(3) as $chunk)
		@foreach($chunk as $product)
		<div class="grid_1_of_4 images_1_of_4">
			<a href="{{ url('product',$product->id) }}"><img src="{{ $product->images[0] }}" alt="" /></a>
			<h2>{{ $product->title }}</h2>
			<div class="price-details">
				<div class="price-number">
					<p><span class="rupees">{{ $product->price }} {{ $product->currency->title }}</span></p>
				</div>
				<div class="add-cart">								
					<h4><a href="preview.html">В корзину</a></h4>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		@endforeach
	@empty
		<div>Нет товаров</div>
	@endforelse
	<!-- <div class="grid_1_of_4 images_1_of_4">
		<a href="preview.html"><img src="{{asset('assets/images/new-pic1.jpg')}}" alt="" /></a>					
		<h2>Lorem Ipsum is simply </h2>
		<div class="price-details">
			<div class="price-number">
				<p><span class="rupees">$849.99</span></p>
			</div>
			<div class="add-cart">								
				<h4><a href="preview.html">В корзину</a></h4>
			</div>
			<div class="clear"></div>
		</div>
	</div> -->
</div>