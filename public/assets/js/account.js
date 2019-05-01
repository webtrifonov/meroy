//let order = document.querySelector()
function toggleShowCartItems(item) {
    let cartTable = item.closest('.order_item_line').nextElementSibling.querySelector('.cart_items_table');
    //cartTable.style.display = 'block';
    cartTable.classList.toggle('hidden');
}
let getCartItemsButton = document.querySelectorAll('.more_order_details');
getCartItemsButton.forEach((item) => {
    item.addEventListener('click', () => {
        toggleShowCartItems(item);
    });
})