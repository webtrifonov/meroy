<div class="content_top">
	<div class="heading">
		<h3>Новые поступления</h3>
	</div>
	<div class="see">
		<p><a href="{{ route('index') }}">Смотреть всё</a></p>
	</div>
	<div class="clear"></div>
</div>
<div class="section group">
	@forelse($demo_new_products as $product)
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
	@empty
		<div>Нет товаров</div>
	@endforelse
</div>