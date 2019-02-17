@extends('layouts.productTemplate')
@section('title', 'Товар')

@section('header')
	@include('layouts.header')
@endsection
@section('breadcrumbs')
	@include('layouts.breadcrumbs')
@endsection

@section('product')
<div class="product-details">				
	<div class="grid images_3_of_2">
		<div id="container">
			<div id="products_example">
				<div id="products">
					<div class="slides_container">
						@foreach($product->images as $image)
							<a><img src="{{ $image }}" alt=" "/></a>
						@endforeach
					</div>
					<ul class="pagination">
						@foreach($product->images as $image)
							<li><a href="#"><img src="{{ $image }}" alt=" "/></a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="desc span_3_of_2">
		<h2>{{ $product->title }}</h2>
		<p>{{ $product->mini_description }}</p>					
		<div class="price">
			<p>Стоимость: <span>{{ $product->price }}{{ $product->currency->title }}</span></p>
		</div>
		<!-- <p></p> -->
		<form action="{{ route('index') }}" method="GET">
			<div class="available">
				<ul>
					<li>Количество: 
						<input name="qty" type="number" value="1">
					</li>
										<!-- <li>Size:<select>
											<option>Large</option>
											<option>Medium</option>
											<option>small</option>
											<option>Large</option>
											<option>small</option>
										</select></li>
										<li>Quality:<select>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select></li> -->
									</ul>
								</div>
								<div class="share-desc">
									<div class="button"><span><a href="{{ route('index') }}">Добавить в корзину</a></span></div>					
									<div class="clear"></div>
								</div>
							</form>
						</div>
						<div class="clear"></div>
					</div>
					<div class="product_desc">	
						<div id="horizontalTab">
							<ul class="resp-tabs-list">
								<li>Характеристика</li>
								<li>Описание</li><!-- 
								<li>Product Reviews</li> -->
								<div class="clear"></div>
							</ul>
							<div class="resp-tabs-container">
								<div class="product-desc">
									<div class="product_prop">
										@foreach($product->property_set as $property)
											<p>{{ $property }}</p>
										@endforeach
									</div>
									<div class="product_val">
										@foreach($product->value_set as $value)
											<p>{{ $value }}</p>
										@endforeach
									</div>
								</div>
								<div class="product-tags">
									<p>{{ $product->description }}</p>
								</div>	

									<!-- <div class="review">
										<h4>Lorem ipsum Review by <a href="#">Finibus Bonorum</a></h4>
										<ul>
											<li>Price :<a href="#"><img src="images/price-rating.png" alt="" /></a></li>
											<li>Value :<a href="#"><img src="images/value-rating.png" alt="" /></a></li>
											<li>Quality :<a href="#"><img src="images/quality-rating.png" alt="" /></a></li>
										</ul>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
										<div class="your-review">
											<h3>How Do You Rate This Product?</h3>
											<p>Write Your Own Review?</p>
											<form>
												<div>
													<span><label>Nickname<span class="red">*</span></label></span>
													<span><input type="text" value=""></span>
												</div>
												<div><span><label>Summary of Your Review<span class="red">*</span></label></span>
													<span><input type="text" value=""></span>
												</div>						
												<div>
													<span><label>Review<span class="red">*</span></label></span>
													<span><textarea> </textarea></span>
												</div>
												<div>
													<span><input type="submit" value="SUBMIT REVIEW"></span>
												</div>
											</form>
										</div>				
									</div> -->
								</div>
							</div>
						</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#horizontalTab').easyResponsiveTabs({
      type: 'default', //Types: default, vertical, accordion           
      width: 'auto', //auto or any width like 600px
      fit: true   // 100% fit in a container
   	});
	});
</script>		
@endsection

@section('menu')
	@include('layouts.menu')
@endsection
@section('popular_products')
	@include('layouts.popular_products')
@endsection
@section('footer')
	@include('layouts.footer')
@endsection