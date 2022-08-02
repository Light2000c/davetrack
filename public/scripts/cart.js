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
                document.getElementById('sub_total').innerHTML = '$' + total.total;
                document.getElementById('total').innerHTML = '$' + total.total;
            }
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
                document.getElementById('cartTotal').innerHTML =  data.cart_count;
            }
        })
        .catch(error => console.log(error));

}

