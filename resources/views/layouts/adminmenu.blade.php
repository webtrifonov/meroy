<div class="card">
    <div class="card-header"><h4>Меню</h4></div>
    <div class="card-body admin_panel_menu">
        <ul>
            <li><a href="{{ route('admin.index') }}">О пользователе</a></li>
            <li class="admin_menu_subtitle">Слайды на главной</li>
            <ul>
                <li><a href="{{ route('slide.index') }}">Просмотреть</a></li>
                <li><a href="{{ route('slide.create') }}">Добавить</a></li>
                <li><a href="{{ route('index') }}">Изменить</a></li>
                <li><a href="{{ route('index') }}">Удалить</a></li>
            </ul>
            <li class="admin_menu_subtitle">Категории товаров</li>
            <ul>
                <li><a href="{{ route('category.index') }}">Просмотреть</a></li>
                <li><a href="{{ route('category.create') }}">Добавить</a></li>
                <li><a href="{{ route('index') }}">Изменить</a></li>
                <li><a href="{{ route('index') }}">Удалить</a></li>
            </ul>
            <li class="admin_menu_subtitle">Товары</li>
            <ul>
                <li><a href="{{ route('product.index') }}">Просмотреть</a></li>
                <li><a href="{{ route('product.create') }}">Добавить</a></li>
                <li><a href="{{ route('index') }}">Изменить</a></li>
                <li><a href="{{ route('index') }}">Удалить</a></li>
            </ul>
            <li><a href="{{ route('index') }}">Подчиненного сотрудника?</a></li>
        </ul>
    </div>
</div>