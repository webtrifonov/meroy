<div class="demo_products_wrapper">
    <div class="demo_products_header row justify-content-between">
        <div class="col-auto">
            <h2 class="head_text">Новые поступления</h2>
        </div>
        <div class="col-auto">
            <a href="{{ route('products.new') }}">Смотреть всё</a>
        </div>
    </div>
    <div class="demo_products row">
        @forelse($demo_new_products as $product)
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div data-product='{
                    "id": "{{ $product->id }}",
                    "title": "{{ $product->title }}",
                    "price": "{{ $product->price }}",
                    "currency": "{{ $product->currency->title }}",
                    "amount": "1"
                }' class="product">
                    <a href="{{ url('product', $product->id) }}">
                        <img src="{{ $product->images[0] }}" alt="" />
                        <h2>{{ $product->title }}</h2>
                    </a>
                    <p class="price_details">
                        <span class="price">{{ $product->price }} </span>
                        <span>{{ $product->currency->title }}</span>
                    </p>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-auto">
                            <div class="amount">
                                <div class="qty_number">
                                    <input class="amount_number" type="text" value="1">
                                </div>
                                <div class="qty_arrows">
                                    <div class="qty_arrow qty_up_arrow"></div>
                                    <div class="qty_arrow qty_down_arrow"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-auto">
                            <button style="display: block" id="add_to_cart_button_{{ $product->id }}" class="add_to_cart_button cart_button">В корзину</button>
                            <button style="display: none" id="delete_from_cart_button_{{ $product->id }}" class="delete_from_cart_button cart_button">Из корзины</button>
                        </div>
                    </div>
                </div> 
            </div>    
        @empty
            <div class="col-12">Нет товаров</div>
        @endforelse
    </div>
</div>