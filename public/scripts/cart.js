window.onload = function () {
    //   myCarts();
}

function myCarts(userIds) {
    var subtotal = '$122';
    var my_total = "";
    var options = {
        method: 'Get',
        headers: {},
    };
    fetch(`http://127.0.0.1:8000/api/total/${userIds}`, options)
        .then((response) => {
            return response.json();

        }
        ).then((total) => {
            if (total.total) {
                document.getElementById('sub_total').innerHTML = '₦' + total.total;
                document.getElementById('total').innerHTML = '₦' + total.total;
            }
            if(total.cart_count){
                document.getElementById('cartTotal').innerHTML =  total.cart_count;
            }
        })
        .catch(error => console.log(error));

}

function cartItems(userIds) {
    var subtotal = '$122';
    var my_total = "";
    var options = {
        method: 'Get',
        headers: {},
    };
    fetch(`http://127.0.0.1:8000/api/total/${userIds}`, options)
        .then((response) => {
            return response.json();

        }
        ).then((total) => {
            if(total.cart_count){
                document.getElementById('cartTotal').innerHTML =  total.cart_count;
            }
        })
        .catch(error => console.log(error));

}

function cartCount(userIds) {
    var subtotal = '$122';
    var my_total = "";
    var options = {
        method: 'Get',
        headers: {},
    };
    fetch(`http://127.0.0.1:8000/api/total/${userIds}`, options)
        .then((response) => {
            return response.json();

        }
        ).then((data) => {

            if(data.cart_count){
               var new_num = Number(data.cart_count);
                document.getElementById('cartTotal').innerHTML =  new_num.toLocaleString();
            }
        })
        .catch(error => console.log(error));

}

function cartCartCount(userIds) {
    var subtotal = '$122';
    var my_total = "";
    var options = {
        method: 'Get',
        headers: {},
    };
    fetch(`http://127.0.0.1:8000/api/total/${userIds}`, options)
        .then((response) => {
            return response.json();

        }
        ).then((data) => {

            if(data.cart_count){
               var new_num = Number(data.cart_count);
                document.getElementById('cartItems').innerHTML =  new_num.toLocaleString();
            }
        })
        .catch(error => console.log(error));

}

function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('check')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}

function onlyOnenext(checkbox) {
    var checkboxes = document.getElementsByName('check2')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}

