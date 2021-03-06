<div class="card">
    <div class="card-header"><h4>Меню</h4></div>
    <div class="card-body admin_panel_menu">
        <ul>
            <li><a href="{{ route('admin.index') }}">Сообщения клиентов</a></li>
            <li><a href="{{ route('order.index') }}">Заказы покупателей</a></li>
            <br>
            <li class="admin_menu_subtitle">Слайды на главной</li>
            <ul>
                <li><a href="{{ route('slide.index') }}">Просмотреть/ &nbsp;Изменить/Удалить</a></li>
                <li><a href="{{ route('slide.create') }}">Добавить</a></li>
                {{--<li><a href="{{ route('slide.delete') }}">Удалить</a></li>--}}
            </ul>
            <li class="admin_menu_subtitle">Категории товаров</li>
            <ul>
                <li><a href="{{ route('category.index') }}">Просмотреть/ &nbsp; Изменить/Удалить</a></li>
                <li><a href="{{ route('category.create') }}">Добавить</a></li>
                {{--<li><a href="{{ route('category.delete') }}">Удалить</a></li>--}}
            </ul>
            <li class="admin_menu_subtitle">Товары</li>
            <ul>
                <li><a href="{{ route('product.index') }}">Просмотреть/ &nbsp; Изменить/Удалить</a></li>
                <li><a href="{{ route('product.create') }}">Добавить</a></li>
                {{--<li><a href="{{ route('product.delete') }}">Удалить</a></li>--}}
            </ul>

        </ul>
    </div>
</div>