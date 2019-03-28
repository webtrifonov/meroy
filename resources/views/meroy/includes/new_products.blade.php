<div class="demo_products_wrapper">
    <div class="demo_products_header row justify-content-between">
        <div class="col-auto">
            <h2>Новые поступления</h2>
        </div>
        <div class="col-auto">
            <a href="{{ route('products.new') }}">Смотреть всё</a>
        </div>
    </div>
    <div class="demo_products row">
        @forelse($demo_new_products as $product)
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="product">
                <a href="{{ url('product', $product->id) }}">
                    <img src="{{ $product->images[0] }}" alt="" />
                    <h2>{{ $product->title }}</h2>
                </a>
                    <div class="price_details row justify-content-between">
                        <div class="price col-auto">
                            <p>{{ $product->price }} <span>{{ $product->currency->title }}</span></p>
                        </div>
                        <div class="add_cart col-auto">                              
                            <h4><a href="#">В корзину</a></h4>
                        </div>
                    </div>
                </div> 
            </div>    
        @empty
            <div class="col-12">Нет товаров</div>
        @endforelse
    </div>
</div>