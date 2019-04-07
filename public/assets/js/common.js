let changeAmount = function() {
    let amount = this.parentNode.parentNode.querySelector('.amount');
    if (this.classList[1] === 'qty_up_arrow') {
        amount.value = +amount.value + 1;
    } else if (this.classList[1] === 'qty_down_arrow') {
        if(amount.value > 1) {
            amount.value = +amount.value - 1;
        }
    }

}
let amountArrows = document.querySelectorAll('.qty_up_arrow, .qty_down_arrow');
amountArrows.forEach((item) => {
    item.addEventListener('mousedown', changeAmount);
});
let addToCart = document.querySelector('.add_to_cart');
addToCart.addEventListener('click', function() {
    let cartCounter = document.querySelector('#cart_count');
    cartCounter.innerHTML = +cartCounter.innerHTML + 1
});


