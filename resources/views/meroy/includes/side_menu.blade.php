<aside class="side_menu">
    <h3 class="side_menu_header">Каталог</h3>
    <ul>
        @forelse($categories as $category)
            <li><a href="{{asset('category/'.$category->id) }}">{{ $category->title }}</a></li>
        @empty
            <li>Нет категорий</li>
        @endforelse 
    </ul>
</aside>