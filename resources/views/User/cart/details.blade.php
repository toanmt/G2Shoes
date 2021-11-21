<section class="cart">
  <div class="cart__container">
    <div class="cart__info">
      <div class="cart__title">
        GIỎ HÀNG CỦA BẠN
      </div>
      <div class="cart__list">
        <form action="" method="" id="cartformpage">
            <div class="cart__list-row">
                <div class="cart__list-title">
                    Bạn đang có <span>{{ count($carts) }} sản phẩm</span> trong giỏ hàng
                </div>
                <div class="cart__list-table">
                    <?php $total_price = 0 ?>
                  @foreach($carts as $key => $product)  
                    <div class="cart__list-item line-item line-item-container" data-variant-id="{{ $product['id'] }}">
                        <div class="left">
                            <div class="item-img">
                                <a href="#">
                                    <img src="{{ asset('Image/'.$product['image']->first()->image_name) }}" alt="{{ $product['product_name'] }}">
                                </a>
                            </div>
                        </div>
                        <div class="right">
                            <div class="item-info">
                                <a href="#">
                                    <div class="item-name">{{ $product['product_name'] }}</div>
                                    <div class="item-desc">
                                        <span class="variant_title">{{ $product['product_size'] }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="item-quan">
                                <div class="">
                                    <button class="btn-quantity btn-minus">-</button>
                                    <input type="text" min="1" class="quantity-box" id="product-quantity" data-price="{{ $product['price'] - ($product['price'] * $product['discount'])/100 }}" value="{{ $product['quantity'] }}">
                                    <button class="btn-quantity btn-plus">+</button>
                                </div>
                            </div>
                            <div class="item-price">
                                <p>
                                    <span>{{ $product['price'] - ($product['price'] * $product['discount'])/100 }}₫</span>
                                </p>
                            </div>
                            <div class="item-total-price">
                                <div class="price">
                                    <span class="text">Thành tiền:</span>
                                    <span class="line-item-total">{{ $product['quantity'] * ($product['price'] - ($product['price'] * $product['discount'])/100) }}₫</span>
                                </div>
                                <div class="remove">
                                    <a href="#" class="cart">
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
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chính sách Đổi/Trả</h4>
                    <ul>
                        <li>Sản phẩm được đổi 1 lần duy nhất, không hỗ trợ trả.</li>
                        <li>Sản phẩm còn đủ tem mác, chưa qua sử dụng.</li>
                        <li>Sản phẩm nguyên giá được đổi trong 30 ngày trên toàn hệ thống.</li>
                        <li>Sản phẩm sale chỉ hỗ trợ đổi size (nếu cửa hàng còn) trong 7 ngày trên toàn hệ thống.</li>
                    </ul>
                </div>
            </div>
        </form>
      </div>
    </div>
    <div class="cart__sidebar">
        <a href="/" class="continue">Tiếp tục mua hàng →</a>
        <div class="order-summary-block">
            <h2 class="order-summary-title">Thông tin đơn hàng</h2>
            <div class="summary-total">
                <p>Tổng tiền: <span>{{ $total_price }}₫</span>
                </p>
            </div>
            <div class="summary-action">
                <p>Bạn có thể nhập mã giảm giá ở trang thanh toán</p>
                <a class="checkout-btn" href="#">THANH TOÁN</a>
            </div>
        </div>
        <div class="btn-action support">
            Nhấn vào đây để hỗ trợ nhanh nhất
        </div>
    </div>
  </div>
</section>