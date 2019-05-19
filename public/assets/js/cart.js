const ADDRESS_PRICE = 400;
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
        cartItemLine.querySelector('.cart_item_total_price').innerText = lsCartItem.price * lsCartItem.amount + ' ' + lsCartItem.currency;
        cartTableBody.appendChild(cartItemLine);
    });
    cartItemLineTemplate.classList.toggle('hidden');
}
function loadAddress() {
    let address = document.querySelector('#address_field');
    let addressTemplate = document.querySelector('#address_template');
    if (getCookie('address')) {
        document.querySelector('.delivery_button').checked = true;
        addressTemplate.classList.remove('hidden');
        address.value = getCookie('address');
    } else {
        addressTemplate.classList.add('hidden');
    }
}
function loadCartTable() {
    let lsCartItems = JSON.parse(localStorage.getItem('MlCartItems'));
    let cartItemsBlock = document.querySelector('#cart_items');
    while (cartItemsBlock.firstChild) {
        cartItemsBlock.firstChild.remove();
    }
    if (lsCartItems && lsCartItems.length) {
        let cartTemplate = document.querySelector('.cart_template').cloneNode(true);
        generateCartTableBody(cartTemplate);
        calculateTotalPrice(cartTemplate);
        cartTemplate.style.display = 'block';
        document.querySelector('#total_price_template').style.display = 'block';
        document.querySelector('#cart_items').appendChild(cartTemplate);
    } else {
        document.querySelector('.no_cart_items').style.display = 'block';
        document.querySelector('#total_price_template').style.display = 'none';
        document.querySelector('#cart_items').appendChild(document.querySelector('.no_cart_items'));
        //cartTemplate.style.display = 'none';
    }
}

function calculateTotalPrice(cartTemplate) {
    let lsCartItems = JSON.parse(localStorage.getItem('MlCartItems'));
    let totalPrice = lsCartItems.reduce((totalPrice, lsCartItem) => {
        return totalPrice + lsCartItem.price * lsCartItem.amount;
    }, 0);
    if (document.querySelector('.delivery_button').checked) {
        totalPrice += ADDRESS_PRICE;
    }
    document.querySelector('.cart_total_price').innerText = totalPrice;

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
    //if (e.target.hasAttribute('data-checkout')) {
    //    localStorage.removeItem('MlCartItems');
    //}
    if (e.target.hasAttribute('data-checkout')) {
        checkout();
    }
}
document.addEventListener('click', listeners);
document.addEventListener('change', function (e) {
    if (e.target.classList.contains('delivery_button')) {
        document.querySelector('#address_template').classList.toggle('hidden');
        calculateTotalPrice();
    }
});
let cartTemplate = document.querySelector('.cart_template').cloneNode(true);
loadAddress();
loadCartTable();

function checkout() {
    let lsProducts = JSON.parse(localStorage.getItem('MlCartItems'));
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let url = '/checkout?';
    lsProducts.forEach((product, i) => {
        url += 'products[' + i + ']=' + product.id + '&amounts[' + i + ']=' + product.amount;
        //удаление последнего '&' в запросе
        if (i !== lsProducts.length - 1) {
            url += '&';
        }
    });
    let address = document.querySelector('#address_field').value;
    if (document.querySelector('.delivery_button').checked) {
        setCookie('address', address, {
            path: '/cart',
            expires: 3600 * 24
        });
        url += '&address=' + address;
    }
    $.ajax({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       url: url,
       dataType : 'json',
       type: 'POST',
       data: {_token: $('meta[name="csrf-token"]').attr('content')},
       contentType: false,
       processData: false,
       success: function(data) {
           localStorage.removeItem('MlCartItems');
           loadCartTable();
           setCartCount();
           $('#success_modal').modal('show');
       },
       error: function () {
           location.href = '/login';
       }
    });
    //fetch(url, {
    //    headers: {
    //        'X-CSRF-TOKEN': csrfToken,
    //    },
    //    method: 'POST'
    //})
    //    .then((response) => response.json())
    //    .then((data) => {
    //        if (data.success === true) {
    //            alert('заказ оформлен');
    //            //localStorage.removeItem('MlCartItems');
    //        }
    //    });
}
function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}
function setCookie(name, value, options) {
    options = options || {};

    var expires = options.expires;

    if (typeof expires == "number" && expires) {
        var d = new Date();
        d.setTime(d.getTime() + expires * 1000);
        expires = options.expires = d;
    }
    if (expires && expires.toUTCString) {
        options.expires = expires.toUTCString();
    }

    value = encodeURIComponent(value);

    var updatedCookie = name + "=" + value;

    for (var propName in options) {
        updatedCookie += "; " + propName;
        var propValue = options[propName];
        if (propValue !== true) {
            updatedCookie += "=" + propValue;
        }
    }

    document.cookie = updatedCookie;
}
function deleteCookie(name) {
    setCookie(name, "", {
        expires: -1
    })
}
// function checkout() {
//     let lsProducts = JSON.parse(localStorage.getItem('MlCartItems'));
//     let url = '/api/v0/checkout?products=' + localStorage.getItem('MlCartItems')[0];
//     //let url = 'checkout?products=' + localStorage.getItem('MlCartItems');
//     let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//     // console.log($('meta[name="csrf-token"]').attr('content'));
//     console.log(url);
//     //$.ajax({
//     //    headers: {
//     //        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     //    },
//     //    url: url,
//     //    dataType : 'json',
//     //    type: 'POST',
//     //    data: {_token: $('meta[name="csrf-token"]').attr('content')},
//     //    contentType: false,
//     //    processData: false,
//     //    success:function(response) {
//     //        console.log(response);
//     //    }
//     //});
//      fetch(url, {
//          headers: {
//
//              //'Content-Type': 'application/json',
//              //'Accept': 'application/json, text-plain, */*',
//              //'X-Requested-With': 'XMLHttpRequest',
//              'X-CSRF-TOKEN': csrfToken,
//          },
//          //body: JSON.stringify({
//          //    'csrf-token': csrfToken
//          //}),
//          //credentials: 'same-origin',
//          //mode: 'same-origin',
//          method: 'POST'
//      }).then((response) => {
//          return response.json()
//      }).then((data) => {
//          if (data.success === true) {
//              console.log(data);
//              //localStorage.removeItem('MlCartItems');
//              //localStorage.removeItem('MlCartItems');
//          }
//      });
// }
//let checkoutButton = cartTemplate.querySelector('.checkout_button');
// function checkout() {
//     let lsProducts = JSON.parse(localStorage.getItem('MlCartItems'));
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
// checkoutButton.addEventListener('click', checkout);