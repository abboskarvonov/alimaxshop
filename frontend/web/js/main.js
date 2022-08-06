function showCart(cart) {
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}

function getCart() {
    $.ajax({
        url: '/ru/cart/show',
        type: 'GET',
        success: function(res) {
            if (!res) alert('Error1');
            showCart(res);
        },
        error: function() {
            alert('Error!');
        }
    });
}

function clearCart() {
    $.ajax({
        url: '/ru/cart/clear',
        type: 'GET',
        success: function(res) {
            if (!res) alert('Error1');
            showCart(res);
        },
        error: function() {
            alert('Error!');
        }
    });
}

$('#cart .modal-body').on('click', '.del-item', function() {
    var id = $(this).data('id');
    $.ajax({
        url: '/ru/cart/del-item',
        data: { id: id },
        type: 'GET',
        success: function(res) {
            if (!res) alert('This error!');
            showCart(res);
        },
        error: function() {
            alert('Error');
        }
    });
});

$('.add-to-cart').on('click', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    qty = $('#qty').val();
    $.ajax({
        url: '/ru/cart/add',
        data: { id: id, qty: qty },
        type: 'GET',
        success: function(res) {
            if (!res) alert('Error1');
            showCart(res);
        },
        error: function() {
            alert('Error!');
        }
    });
});