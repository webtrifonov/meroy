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
                <div id="product_{{ $product->id }}" class="product">
                    <a href="{{ url('product', $product->id) }}">
                        <img src="{{ $product->images[0] }}" alt="" />
                        <h2>{{ $product->title }}</h2>
                    </a>
                    <div class="price">
                        <p>{{ $product->price }} <span>{{ $product->currency->title }}</span></p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-auto">
                            <div class="amount">
                                <div class="qty_number">
                                    <input class="amount" type="text" value="1">
                                </div>
                                <div class="qty_arrows">
                                    <div class="qty_arrow qty_up_arrow"></div>
                                    <div class="qty_arrow qty_down_arrow"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-auto">
                            <button class="add_to_cart">В корзину</button>
                        </div>
                    </div>


                    <div class="price_details row justify-content-between">


                    </div>
                </div> 
            </div>    
        @empty
            <div class="col-12">Нет товаров</div>
        @endforelse
    </div>
</div>