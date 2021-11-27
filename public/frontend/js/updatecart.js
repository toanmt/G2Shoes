function updateCart(urlUpdateCart, id, quantity, changeFields) {
    $.ajax({
        type: "GET",
        url: urlUpdateCart,
        data: {
          id: id,
          quantity: quantity
        },
        dataType: 'json',
        success: function (data) {
            if (data.code === 200) {
                let currencyFormat = Intl.NumberFormat('en-US');
                $.notify("Cập nhật giỏ hàng thành công!", "success");
                changeFields.closest('.right').find('.line-item-total').text(currencyFormat.format(data.total_price)+"₫");
                $('.summary-total').load(location.href + ' .total-price')
            }
            else if (data.code === 400) {
                $.notify(data.message, "warn");
            }
        },
        error: function () {
            $.notify("Lỗi cập nhật giỏ hàng!", "danger");
        }
    });
}

$(document).ready(function () {

    //update cart
    $(".quantity-box").off().change(function (e) {
        e.preventDefault();
        let urlUpdateCart = $('.update_cart_url').data('url');
        let id = $(this).closest('.item-quan').find('.item-quan-fields').data('id');
        let qty = $(this).closest('.item-quan').find('.quantity-box');
        let quantity = parseInt(qty.val());

        if (quantity.length == 0) {
            $.notify("Số lượng nhập không được để trống!", "warn");
        }
        else if (isNaN(quantity)) {
            $.notify("Số lượng nhập không được phép chứa ký tự khác số!", "warn");
        }
        else if (parseInt(quantity) < 1) {
            $.notify("Số lượng nhập không được bé hơn 1!", "warn");
        }
        else {
            updateCart(urlUpdateCart, id, quantity, $(this));
        }
    });

    $('.btn-quantity').off().click(function (e) {
        e.preventDefault();
        let urlUpdateCart = $('.update_cart_url').data('url');
        let id = $(this).closest('.item-quan').find('.item-quan-fields').data('id');
        let qty = $(this).closest('.item-quan').find('.quantity-box');
        let quantity = parseInt(qty.val());
        if($(this).hasClass('btn-minus')) {
            quantity = quantity - 1;
        }
        if($(this).hasClass('btn-plus')) {
            quantity = quantity + 1;
        }
        if (quantity.length == 0) {
            $.notify("Số lượng nhập không được để trống!", "warn");
        }
        else if (isNaN(quantity)) {
            $.notify("Số lượng nhập không được phép chứa ký tự khác số!", "warn");
        }
        else if (parseInt(quantity) < 1) {
            $.notify("Số lượng nhập không được bé hơn 1!", "warn");
        }
        else {
            qty.val(quantity);
            updateCart(urlUpdateCart, id, quantity, $(this));
        }
    });

    // Remove from cart
    $('.remove_cart').off().click(function (e) {
        e.preventDefault();
        let urlRemoveCart = location.origin + "/remove-cart";
        let id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: urlRemoveCart,
            data: { id: id },
            dataType: 'json',
            success: function (data) {
                if (data.code === 200) {
                    $.notify("Xoá sản phẩm thành công!", 'success');
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                }
            },
            error: function () {
                $.notify("Lỗi xoá sản phẩm!", null, null, 'danger');
            }
        });
    });

});