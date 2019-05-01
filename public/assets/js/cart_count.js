let setCartCount = function() {
    let cartCounter = document.querySelector('#cart_count');
    if (localStorage.getItem('MlCartItems')) {
        let cartCount = JSON.parse(localStorage.getItem('MlCartItems')).length
        cartCounter.innerHTML = cartCount;
    }
}
setCartCount();