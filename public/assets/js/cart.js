let hiddenProduct = () => {
    let hp = document.createElement('input');
    hp.classList.add('h_products');
    hp.setAttribute('type', 'hidden');
    hp.setAttribute('name', 'h_products[]');
    return hp;
}
function generateCartTableBody(cartTemplate) {
    let cartTableBody = cartTemplate.querySelector('.cart_table').querySelector('tbody');
    let cartItemLineTemplate = cartTemplate.querySelector('.cart_item_line');
    cartItemLineTemplate.classList.toggle('hidden');
    let lsCartItems = JSON.parse(localStorage.getItem('MlCartItems'));
    lsCartItems.forEach((lsCartItem, i) => {
        let cartItemLine = cartItemLineTemplate.cloneNode(true);
        cartItemLine.setAttribute('data-product', lsCartItem.id);
        let hp = hiddenProduct();
        hp.value = JSON.stringify(lsCartItem);
        cartItemLine.appendChild(hp);
        cartItemLine.querySelector('.cart_item_counter').innerText = i + 1;
        cartItemLine.querySelector('.cart_item_title').innerText = lsCartItem.title;
        cartItemLine.querySelector('.cart_item_price').innerText = lsCartItem.price + ' ' + lsCartItem.currency;
        cartItemLine.querySelector('.amount_number').value = lsCartItem.amount;
        cartItemLine.querySelector('.cart_item_total_price').innerText = lsCartItem.price * lsCartItem.amount;
        cartTableBody.appendChild(cartItemLine);
    });
    cartItemLineTemplate.classList.toggle('hidden');
}
function loadCartTable() {
    let lsCartItems = JSON.parse(localStorage.getItem('MlCartItems'));
    let cartItemsBlock = document.querySelector('#cart_items');
    while (cartItemsBlock.firstChild) {
        cartItemsBlock.firstChild.remove();
    }
    //console.log(lsCartItems.length);
    if (lsCartItems && lsCartItems.length) {
        let cartTemplate = document.querySelector('.cart_template').cloneNode(true);
        generateCartTableBody(cartTemplate);
        calculateTotalPrice(cartTemplate);
        cartTemplate.style.display = 'block';
        document.querySelector('#cart_items').appendChild(cartTemplate);
    } else {
        document.querySelector('.no_cart_items').style.display = 'block';
        document.querySelector('#cart_items').appendChild(document.querySelector('.no_cart_items'));
        //cartTemplate.style.display = 'none';
    }
}
function calculateTotalPrice(cartTemplate) {
    let lsCartItems = JSON.parse(localStorage.getItem('MlCartItems'));
    cartTemplate.querySelector('.cart_total_price').innerText = lsCartItems.reduce((totalPrice, lsCartItem) => {
        return totalPrice + lsCartItem.price * lsCartItem.amount;
    }, 0);
}
function deleteCartItem(item) {
    let productItem = item.closest('.cart_item_line');
    let currentProduct = JSON.parse(productItem.dataset.product);
    let lsProducts = JSON.parse(localStorage.getItem('MlCartItems'));
    if (lsProducts) {
        lsProducts.forEach((product) => {
            if (product.id == currentProduct) {
                if (lsProducts.indexOf(product) != -1) {
                    lsProducts.splice(lsProducts.indexOf(product), 1);
                }
            }
        });
        localStorage.setItem('MlCartItems', JSON.stringify(lsProducts));
    }
}
function changeAmount(item) {
    let amountNumber = item.closest('.amount').querySelector('.amount_number');
    let productItem = item.closest('.cart_item_line');
    let currentProduct = JSON.parse(productItem.dataset.product);
    let lsProducts = JSON.parse(localStorage.getItem('MlCartItems'));
    if (lsProducts) {
        lsProducts.forEach((product) => {
            if (product.id == currentProduct) {
                if (item.classList.contains('qty_up_arrow')) {
                    product.amount = +amountNumber.value + 1;
                } else if (item.classList.contains('qty_down_arrow')) {
                    if(amountNumber.value > 1) {
                        product.amount = +amountNumber.value - 1;
                    }
                }

            }
        });
        localStorage.setItem('MlCartItems', JSON.stringify(lsProducts));
    }
}
function listeners(e) {
    if (e.target.hasAttribute('data-delete_cart_product')) {
        deleteCartItem(e.target);
        loadCartTable();
        calculateTotalPrice(cartTemplate);
        setCartCount();
    }
    if (e.target.classList.contains('qty_up_arrow') || e.target.classList.contains('qty_down_arrow')) {
        changeAmount(e.target);
        loadCartTable();
        calculateTotalPrice(cartTemplate);
    }
    if (e.target.classList.contains('checkout_button')) {
        localStorage.removeItem('MlCartItems');
    }
}
document.addEventListener('click', listeners);
let cartTemplate = document.querySelector('.cart_template').cloneNode(true);
loadCartTable();
// let deleteCartItemButton = cartTemplate.querySelectorAll('.delete_cart_item');
// deleteCartItemButton.forEach((item) => {
//     item.addEventListener('click', (e) => {
//         deleteCartItem(item);
//         //item.parentNode.parentNode.remove();
//         loadCartTable();
//         // calculateTotalPrice(cartTemplate);
//         setCartCount();
//     });
// });

// function updateCartItemPrice(item) {
//     let productItem = item.closest('.cart_item_line');
//     let currentProduct = productItem.dataset.product;
//
//     let lsProducts = JSON.parse(localStorage.getItem('MlCartItems'));
//     if (lsProducts) {
//         lsProducts.forEach((lsProduct) => {
//             if (lsProduct.id == currentProduct) {
//                 lsProduct.amount = productItem.querySelector('.amount_number').value;
//                 productItem.querySelector('.cart_item_total_price').textContent = lsProduct.price * lsProduct.amount;
//             }
//         });
//         localStorage.setItem('MlCartItems', JSON.stringify(lsProducts));
//     }
// }

/*** Event Listeners ***/
// let amountArrows1 = cartTemplate.querySelectorAll('.qty_up_arrow, .qty_down_arrow');
// amountArrows1.forEach((item) => {
//     item.addEventListener('click', () => {
//         changeAmount(item);
//
//         calculateTotalPrice(cartTemplate)
//     });
// });


// function checkout() {
//     let lsProducts = JSON.parse(localStorage.getItem('MlCartItems'));
//     console.log(lsProducts);
//     let url = '/api/v0/checkout?';
//     lsProducts.forEach((product, i) => {
//         url += 'product[' + i + ']=' + product.id + '&amount[' + i + ']=' + product.amount;
//         //удаление последнего '&' в запросе
//         if (i !== lsProducts.length - 1) {
//             url += '&';
//         }
//     });
//     console.log(url);
//     fetch(url, {
//         method: 'POST'
//     })
//         .then((response) => response.json())
//         .then((data) => {
//             if (data.success === true) {
//                 alert('заказ оформлен');
//                 //localStorage.removeItem('MlCartItems');
//             }
//         });
// }
// let checkoutButton = cartTemplate.querySelector('.checkout');
// console.log(checkoutButton);
// checkoutButton.addEventListener('click', checkout);