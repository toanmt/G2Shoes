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
                Swal.fire({title: 'Cập nhật giỏ hàng thành công!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000});
                changeFields.closest('.right').find('.line-item-total').text(currencyFormat.format(data.total_price)+"₫");
                $('.summary-total').load(location.href + ' .total-price')
            }
            else if (data.code === 400) {
                Swal.fire({title: "Lỗi không cập nhật được giỏ hàng!", text: data.message , icon: "warning", confirmButtonText: "OK", buttonsStyling: true});
            }
        },
        error: function () {
            Swal.fire({title: 'Lỗi mạng!', icon: 'error', confirmButtonText: "OK", buttonsStyling: true});
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
            Swal.fire({title: 'Số lượng nhập không được để trống!' , icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
        }
        else if (isNaN(quantity)) {
            Swal.fire({title: 'Số lượng nhập không được phép chứa ký tự khác số!' , icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
        }
        else if (parseInt(quantity) < 1) {
            Swal.fire({title: 'Số lượng nhập không được bé hơn 1!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
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
            Swal.fire({title: 'Số lượng nhập không được để trống!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
        }
        else if (isNaN(quantity)) {
            Swal.fire({title: 'Số lượng nhập không được phép chứa ký tự khác số!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})

        }
        else if (parseInt(quantity) < 1) {
            Swal.fire({title: 'Số lượng nhập không được bé hơn 1!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
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
                    Swal.fire({title: 'Xoá sản phẩm thành công!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                }
                else Swal.fire({title: 'Xoá sản phẩm thất bại!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
            },
            error: function () {
                Swal.fire({title: 'Lỗi mạng!', icon: 'error', confirmButtonText: "OK", buttonsStyling: true});
            }
        });
    });

});