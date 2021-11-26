<section class="cart">
  <div class="cart__container">
    <div class="cart__info">
      <div class="cart__title">
        GIỎ HÀNG CỦA BẠN
      </div>
      <div class="cart__list">
      <?php $total_price = 0 ?>
        @if(isset($session['cart']) && count($carts) > 0)
        <form id="cartformpage">
            <div class="cart__list-row">
                <div class="cart__list-title">
                    Bạn đang có <span>{{ count($carts) }} sản phẩm</span> trong giỏ hàng.
                </div>
                <div class="cart__list-table update_cart_url" data-url="{{ route('updateCart') }}">
                  @foreach($carts as $key => $product)
                    <div class="cart__list-item" data-variant-id="{{ $product['id'] }}">
                        <div class="left">
                            <div class="item-img">
                                <a href="{{ URL::to('/product_details/'.$product['id'])}}">
                                    <img src="{{ asset('Image/'.$product['image']->first()->image_name) }}" alt="{{ $product['product_name'] }}">
                                </a>
                            </div>
                        </div>
                        <div class="right">
                            <div class="item-info">
                                <a href="{{ URL::to('/product_details/'.$product['id'])}}">
                                    <div class="item-name">{{ $product['product_name'] }}</div>
                                    <div class="item-desc">
                                        <span class="variant_title">{{ $product['product_size'] }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="item-quan">
                                <div class="item-quan-fields" data-id="{{ $key }}">
                                    <button class="btn-quantity btn-minus">-</button>
                                    <input type="text" min="1" max="20" class="quantity-box" id="product-quantity" data-price="{{ $product['price'] - ($product['price'] * $product['discount'])/100 }}" value="{{ $product['quantity'] }}">
                                    <button class="btn-quantity btn-plus">+</button>
                                </div>
                            </div>
                            <div class="item-price">
                                <p>
                                    <span>{{ number_format($product['price'] - ($product['price'] * $product['discount'])/100) }}₫</span>
                                </p>
                            </div>
                            <div class="item-total-price">
                                <div class="price">
                                    <span class="text">Thành tiền:</span>
                                    <span class="line-item-total">{{ number_format($product['quantity'] * ($product['price'] - ($product['price'] * $product['discount'])/100)) }}₫</span>
                                </div>
                                <div class="remove">
                                    <a href="#" class="remove_cart" data-url="{{ route('removeCart') }}" data-id="{{ $key }}">
                                        <img src="//theme.hstatic.net/1000383440/1000607590/14/ic_close.png?v=80">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $total_price = $total_price + $product['quantity'] * ($product['price'] - ($product['price'] * $product['discount'])/100); ?>
                  @endforeach
                </div>
            </div>
            <div class="cart__list-row">
                <div class="policy_return">
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chính sách đổi/trả</h4>
                    <ul>
                        <li>Sản phẩm được đổi 1 lần duy nhất, không hỗ trợ trả.</li>
                        <li>Sản phẩm còn đủ tem mác, chưa qua sử dụng.</li>
                        <li>Sản phẩm nguyên giá được đổi trong 30 ngày trên toàn hệ thống.</li>
                        <li>Sản phẩm sale chỉ hỗ trợ đổi size (nếu cửa hàng còn) trong 7 ngày trên toàn hệ thống.</li>
                    </ul>
                </div>
            </div>
        </form>
        @endif
        @if(empty($session['cart']))
        <div id="cartformpage">
            <div class="empty-cart-message">
				Giỏ hàng của bạn đang trống!
			</div>
            <div class="empty-cart-btn">
                <a href="/" class="btn-action return-home"><i class='bx bx-undo'></i>Tiếp tục mua hàng</a>
            </div>
        </div>
        @endif
      </div>
    </div>
    <div class="cart__sidebar">
        <a href="/" class="continue">Tiếp tục mua hàng →</a>
        <div class="order-summary-block">
            <h2 class="order-summary-title">Thông tin đơn hàng</h2>
            <div class="summary-total">
                <p class="total-price">Tổng tiền: <span>{{ number_format($total_price) }}₫</span>
                </p>
            </div>
            <div class="summary-action">
                <p>Bạn có thể nhập mã giảm giá ở trang thanh toán</p>
                <a class="checkout-btn" href="{{ URL::to('payment') }}">THANH TOÁN</a>
            </div>
        </div>
        <a href="{{URL::to('/contact')}}" class="btn-action support">
            Nhấn vào đây để hỗ trợ nhanh nhất
        </a>
    </div>
  </div>
<script type="text/javascript">
//update cart
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
        let urlRemoveCart = $(this).data('url');
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

</script>
</section>
