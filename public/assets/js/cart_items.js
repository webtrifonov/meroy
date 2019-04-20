// let randomString = function (len) {
//     let charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
//     let randomStr = '';
//     for (let i = 0; i < len; i += 1) {
//         randomStr += charset.charAt(Math.floor(Math.random() * charset.length));
//     }
//     return randomStr;
// }
//console.log(randomString(60));

// let addToCart1 = function() {
//     let productItem = this.parentNode.parentNode.parentNode;
//     let id = +productItem.id.replace('product_', '');
//     let amount = +productItem.querySelector('.amount_number').value;
//     fetch('/api/v0/cart/items/' + id +'?amount=' + amount, {
//         method: 'POST'
//     })
//         .then((response) => response.json())
//     .then((data) => {
//         if (data.success === true) {
//             alert('Товар добавлен в корзину');
//             localStorage.setItem('product' + id, JSON.stringify({"id": id, "amount": amount}));
//         }
//     });
// }
// let deleteFromCart1 = function(e) {
//     e.preventDefault();
//     let id = +this.id.replace('delete_from_cart_', '');
//     fetch('/app/v0/cart/item/' + id)
//         .then((response) => response.json())
//     .then((data) => {
//         if (data.success === true) {
//             alert('Товар удален из базы но не удален из корзины');
//             //localStorage.setItem('product' + id, JSON.stringify({"id": id, "amount": amount}));
//         }
//     });
// }

let setCartCount = function() {
    let cartCounter = document.querySelector('#cart_count');
    if (localStorage.getItem('MlCartItems')) {
        let cartCount = JSON.parse(localStorage.getItem('MlCartItems')).length
        cartCounter.innerHTML = cartCount;
    }
}
function addToCart(item) {
    let productItem = item.parentNode.parentNode.parentNode;
    let currentProduct = JSON.parse(productItem.dataset.product);
    let amount = +productItem.querySelector('.amount_number').value;
    currentProduct.amount = amount;
    let lsProducts = JSON.parse(localStorage.getItem('MlCartItems'));
    if (lsProducts) {
        lsProducts.push(currentProduct);
        localStorage.setItem('MlCartItems', JSON.stringify(lsProducts));
    } else {
        let clientProducts = [];
        clientProducts.push(currentProduct);
        localStorage.setItem('MlCartItems', JSON.stringify(clientProducts));
    }
}
let deleteFromCart = function(item) {
    let productItem = item.parentNode.parentNode.parentNode;
    let currentProduct = JSON.parse(productItem.dataset.product);
    let lsProducts = JSON.parse(localStorage.getItem('products'));
    if (lsProducts) {
        lsProducts.forEach((product) => {
            if (product.id == currentProduct.id) {
                if (lsProducts.indexOf(product) != -1) {
                    lsProducts.splice(lsProducts.indexOf(product), 1);
                }
            }
        });
        localStorage.setItem('MlCartItems', JSON.stringify(lsProducts));
    }
}
let changeAddToCartButton = function(product) {
    product.querySelector('.add_to_cart_button').style.display = 'none';
    product.querySelector('.delete_from_cart_button').style.display = 'block';
}
let changeDeleteFromCartButton = function(product) {
    product.querySelector('.delete_from_cart_button').style.display = 'none';
    product.querySelector('.add_to_cart_button').style.display = 'block';
}
function checkProductInCart(product) {
    let lsProducts = JSON.parse(localStorage.getItem('MlCartItems'));
    let prodObj = JSON.parse(product.dataset.product);
    if(lsProducts) {
        for (let i=0; i<lsProducts.length; i++) {
            if (lsProducts[i].id == prodObj.id) {
                return true;
            }
        }
    }
    return false;
}
function changeCartButtons() {
    let products = document.querySelectorAll('.product');
    products.forEach((product) => {
        if (checkProductInCart(product)) {
            changeAddToCartButton(product);
        } else {
            changeDeleteFromCartButton(product);
        }
    });
}
let changeAmount = function() {
    let amount = this.parentNode.parentNode.querySelector('.amount_number');
    if (this.classList.contains('qty_up_arrow')) {
        amount.value = +amount.value + 1;
    } else if (this.classList.contains('qty_down_arrow')) {
        if(amount.value > 1) {
            amount.value = +amount.value - 1;
        }
    }

}
/*** Event Listeners ***/
let amountArrows = document.querySelectorAll('.qty_up_arrow, .qty_down_arrow');
amountArrows.forEach((item) => {
    item.addEventListener('click', changeAmount);
});
let addToCartButton = document.querySelectorAll('.add_to_cart_button');
addToCartButton.forEach((item) => {
    item.addEventListener('click', () => {
        addToCart(item);
        changeCartButtons();
        setCartCount();
    });
});
let deleteFromCartButton = document.querySelectorAll('.delete_from_cart_button');
deleteFromCartButton.forEach((item) => {
    item.addEventListener('click', () => {
        deleteFromCart(item)
        changeCartButtons();
        setCartCount();
    });
});
/*** Initial ls load ***/
changeCartButtons();
setCartCount();
