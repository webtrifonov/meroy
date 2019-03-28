@section('header')
<script type="text/javascript">
	function DropDown(el) {
		this.dd = el;
		this.initEvents();
	}
	DropDown.prototype = {
		initEvents : function() {
			var obj = this;
			obj.dd.on('click', function(event){
				$(this).toggleClass('active');
				event.stopPropagation();
			});	
		}
	}
	$(function() {
		var dd = new DropDown( $('#dd') );
		$(document).click(function() {
			// all dropdowns
			$('.wrapper-dropdown-2').removeClass('active');
		});
	});
</script>
<div class="header">
	<div class="col_1_of_4 span_1_of_4" style="border: 0">
		<div class="logo">
				<a href="{{ route('index') }}"><img src="{{asset('assets/images/meroy.svg')}}" alt="" /></a>
			</div>
		</div>
	<div class="col_1_of_4 span_1_of_4" style="border: 0">
		<div class="cart_wrapper">
			<a href="{{ route('cart') }}">
				<img src="{{ asset('assets/images/cart.png') }}" alt="">
		   	<span class="cart_count">0</span>
		   	<span>Корзина</span>
		   	<span class="cart_price">0.00 руб.</span>
			</a>
		   	<!-- <div id="dd" class="wrapper-dropdown-2">  - 0.00 руб.
			   	<ul class="dropdown">
						<li>В корзине нет товаров</li>
					</ul>
				</div> -->
		</div>
	</div>
	<div class="col_1_of_4 span_1_of_4" style="border: 0">
		<div class="auth_account">
			<ul>
				<li><a href="{{ route('register') }}">Регистрация</a></li><span> | </span> 
				<li><a href="{{ route('login') }}">Вход</a></li><span> | </span> 
				<li><a href="{{ route('index') }}">Мой аккаунт</a></li>
			</ul>
		</div>
	</div>
	<div class="clear"></div>
	
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="{{ route('index') }}">Главная</a></li>
			    	<li><a href="{{ route('about') }}">О магазине</a></li>
			    	<li><a href="{{ route('delivery') }}">Доставка</a></li>
			    	<li><a href="{{ route('contacts') }}">Контакты</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" placeholder="Поиск..."><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	</div>	     
</div>
@show