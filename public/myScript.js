// alert('grace');


function update(cartID) {
    var qty = parseInt(document.getElementById('qty').value);
    alert(qty);

    url = 'http://127.0.0.1:8000/product/products';

var options = {
    method : 'Put',
    data: {
        cartId: cartID,
        quantity: qty,
    }
};
    fetch()

}
