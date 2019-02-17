<div class="categories">
	<ul>
		<h3><a href="{{ route('categories') }}">Каталог</a></h3>
			@forelse($categories as $category)
				<li><a href="{{asset('category/'.$category->id) }}">{{ $category->title }}</a></li>
			@empty
				<li>Нет категорий</li>
			@endforelse	
		<!-- <li><a href="#">Доски</a></li> -->
	</ul>
</div>