<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>G2 SHOES - GIÀY CHÍNH HÃNG | SNEAKER AUTHENTIC</title>
  <!-- Favicon -->
  <link
  rel="shortcut icon"
  href="{{ asset('frontend/img/others/favicon.webp') }}"
  type="image/png"
  />
  <!-- Icon -->
  <link
  href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
  rel="stylesheet"
  />
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
  href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap"
  rel="stylesheet"
  />
  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}" />
</head>
  <body>
    <main class="payment">
      <div class="container">
        <div class="payment-details">
          <div class="payment-header">
            <a href="{{ URL::to('/') }}" class="payment-header__title">
              <h4>g2 shoes</h4>
            </a>
            <ul class="payment-nav">
              <li><a href="{{ URL::to('/cart') }}">Giỏ hàng</a></li>
              <li><a href="#">Thông tin giao hàng</a></li>
              <li><a href="#">Phương thức thanh toán</a></li>
            </ul>
          </div>
          <div class="payment-content">
            <div class="payment-content__title">Thông tin giao hàng</div>
            <form action="{{ url('invoice-infor') }}" class="form" method="POST" id="form-infor">
              {{csrf_field()}}
              <div class="form-group">
                <input
                  id="fullname"
                  name="fullname"
                  type="text"
                  class="form-control"
                  placeholder=" "
                />
                <label for="fullname" class="form-label">Họ và tên</label>
                <span class="form-message"></span>
                <span class="form-icon form-icon--warn">
                  <i class="bx bxs-error"></i>
                </span>
              </div>
              <div class="form-group form-email">
                <input
                  id="email"
                  name="email"
                  type="text"
                  class="form-control"
                  placeholder=" "
                />
                <label for="email" class="form-label">Email</label>
                <span class="form-message"></span>
                <span class="form-icon form-icon--warn">
                  <i class="bx bxs-error"></i>
                </span>
              </div>
              <div class="form-group form-phone">
                <input
                  id="phone"
                  name="phone"
                  type="text"
                  class="form-control"
                  placeholder=" "
                />
                <label for="phone" class="form-label">Số điện thoại</label>
                <span class="form-message"></span>
                <span class="form-icon form-icon--warn">
                  <i class="bx bxs-error"></i>
                </span>
              </div>
              <div class="form-group form-address">
                <input
                  id="address"
                  name="address"
                  type="text"
                  class="form-control"
                  placeholder=" "
                />
                <label for="address" class="form-label">Địa chỉ</label>
                <span class="form-message"></span>
                <span class="form-icon form-icon--warn">
                  <i class="bx bxs-error"></i>
                </span>
              </div>
              <div class="form-direct">
                <a href="{{ URL::to('/cart') }}" class="form-cart">Giỏ hàng</a>
                <button class="form-submit" type="submit">
                  Tiếp tục đến với phương thức thanh toán
                </button>
              </div>
            </form>
          </div>
          <div class="payment-content" style="display: none">
            <div class="payment-content__container">
              <div class="payment-content__title">Phương thức vận chuyển</div>
              <div class="payment-content__box">
                <div class="payment-content__transport">
                  <input
                    type="radio"
                    name="shipping-code"
                    id="shipping-code"
                    class="input-radio"
                    checked
                  />
                  <label for="shipping-code" style="padding-left: 0.75em"
                    >Phí vận chuyển</label
                  >
                </div>
                <span>40,000đ</span>
              </div>
            </div>
            <div class="payment-content__container">
              <div class="payment-content__title">Phương thức thanh toán</div>
              <div class="payment-content__box">
                <div class="payment-content__input">
                  <input
                    type="radio"
                    name="payment"
                    id="payment-cod"
                    class="input-radio"
                    value="0"
                    checked
                  />
                  <img src="{{ asset('frontend/img/others/cod.svg') }}" alt="" />
                  <label for="payment-cod"
                    >Thanh toán khi giao hàng (COD)</label
                  >
                </div>
                <div class="payment-content__infor">
                  <span>Quý khách sẽ trả tiền mặt khi giao hàng</span>
                </div>
                <div class="payment-content__input">
                  <input
                    type="radio"
                    name="payment"
                    id="payment-bank"
                    value="1"
                    class="input-radio"
                  />
                  <img src="{{ asset('frontend/img/others/other.svg') }}" alt="" />
                  <label for="payment-bank">Thanh toán online (Internet Banking)</label>
                </div>
                <div class="payment-content__infor payment-banking">
                  Các cổng thành toán: PayPal
                </div>
              </div>
            </div>
            <div class="form-direct">
              <a href="#" class="form-cart" id="form-user-infor">Quay lại thông tin giao hàng</a>
              <a class="form-submit" id="payment-button">Hoàn tất đơn hàng</a>
            </div>
          </div>
          <div class="payment-footer">Powered by G2 SHOES</div>
        </div>
        <div class="payment-order">
          <div class="payment-product">
            <table class="payment-product__table">
              <tbody>
              <?php $total_price = 0 ?>
              @if(isset($session['cart']) && count($carts) > 0)
                @foreach($carts as $key => $product)
                  <tr class="product" data-variant-id="{{ $product['id'] }}">
                    <td class="product-image">
                      <div class="product-thumbnail">
                        <img src="{{ asset('Image/'.$product['image']->first()->image_name) }}" alt="{{ $product['product_name'] }}" />
                      </div>
                      <span class="product-qty">{{ $product['quantity'] }}</span>
                    </td>
                    <td class="product-desc">
                      <div class="product-name"
                        >{{ $product['product_name'] }}
                      </div>
                      <div class="product-size">Size: {{ $product['product_size'] }}</div>
                    </td>
                    <td class="product-price">{{ number_format($product['price'] - ($product['price'] * $product['discount'])/100) }}₫</td>
                  </tr>
                <?php $total_price = $total_price + $product['quantity'] * ($product['price'] - ($product['price'] * $product['discount'])/100); ?>
                @endforeach
              @endif
              </tbody>
            </table>
          </div>
          <div class="payment-voucher">
            <form action="{{ url('voucher') }}" class="form-voucher" id="form-voucher" method="POST">
              {{csrf_field()}}
              <div class="form-group">
                <input
                  id="voucher"
                  name="voucher"
                  type="text"
                  class="form-control"
                  placeholder=" "
                />
                <label for="voucher" class="form-label">Mã giảm giá</label>
                <span class="form-message"></span>
                <span class="form-icon form-icon--warn">
                  <i class="bx bxs-error"></i>
                </span>
              </div>
              <div class="form-direct">
                <button class="form-submit" type="submit">Sử dụng</button>
              </div>
            </form>
          </div>
          <div class="payment-price">
            <div class="payment-price__container">
              <span class="payment-price__title">Tạm tính:</span>
              <span id="subTotal" data-value="{{ $total_price }}">{{ number_format($total_price) }}đ</span>
            </div>
            <div class="payment-price__container">
              <span class="payment-price__title">Phí vận chuyển:</span>
              <span>40,000đ</span>
            </div>
            <div class="payment-voucher__container"></div>
            <div class="payment-price__container" id="total">
              <span class="payment-price__title">Tổng tiền: </span>
              <span>{{ number_format($total_price + 40000) }}₫</span>
              <input type="hidden" id="total_usd" value="{{ ($total_price+40000)/22650 }}">
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="{{ asset('frontend/js/payment.js') }}"></script>
    <script src="{{ asset('frontend/js/notify.min.js') }}"></script>

    <!-- JQUERY -->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
      $(document).ready(function(){
        $('#form-voucher').submit(function(e){
          e.preventDefault();
          var voucher_name = $('#voucher').val();
          $.post(location.origin+'/voucher',$(this).serialize(),function(data){
            if(data.error){
              alert(data.error);
            }else{
              alert(data.success);
              let currencyFormat = Intl.NumberFormat('en-US');
              var total = $('#subTotal').data('value')*
              (1-parseInt(data.voucher_percent)/100)
              +40000;
              $('.payment-voucher__container').empty();
              $('.payment-voucher__container').append('<span class="payment-price__title">Giảm giá:</span><span>'+data.voucher_percent+'%</span>');
              $('#total').empty();
              $('#total').append('<span class="payment-price__title">Tổng tiền: </span>'+
              '<span>'+
                currencyFormat.format(total)
              +'₫</span>'+
              '<input type="hidden" id="total_usd" value="'+
              currencyFormat.format(total/22650)
              +'">');
            }
          });
        })

        $('#form-infor').submit(function(){
            $.post($(this).attr('action'),$(this).serialize(),function(data){});
        });
        function payment(){
          $('#payment-button').click(function(e){
            e.preventDefault();
            $.ajax({
              url: location.origin+'/order',
              type: 'GET',
              data: {'status':0},
              success: function(data){
                alert(data.message);
                setTimeout((data) => {
                  window.location.href = location.origin;
                }, 1000);

              }
            });
          })
        }
        payment();
        $('.input-radio').click(function(){
          if($(this).val() == 0){
            $('#payment-button').show();
            $('.payment-banking').empty().text('Các cổng thành toán: PayPal');
            payment();
          }else{
            $('#payment-button').hide();
            $('.payment-banking').empty().html('<div id="paypal-button"></div>');

            paypal.Button.render({
              // Configure environment
              env: 'sandbox',
              client: {
                sandbox: 'AabvavzWy18f5DZiMcHDgrKoyKUQuYKrCva8vuNxMASjxuvW53xeku1w9yby4L5ofCCZe9dr3O4c8XbF',
                production: 'demo_production_client_id'
              },
              // Customize button (optional)
              locale: 'en_US',
              style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
              },

              // Enable Pay Now checkout flow (optional)
              commit: true,


              // Set up a payment
              payment: function(data, actions) {
                  return actions.payment.create({
                    transactions: [{
                      amount: {
                        total: parseFloat($('#total_usd').val()).toFixed(2),
                        currency: 'USD'
                      }
                    }]
                  });
              },
              // Execute the payment
              onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                  // Show a confirmation message to the buyer
                  $.ajax({
                    url: location.origin+'/order',
                    type: 'GET',
                    data: {'status':1},
                    success: function(data){
                      alert(data.message);
                      setTimeout(() => {

                        window.location.href = location.origin;
                      }, 1000);
                    }
                  });
                })
              }
            },'#paypal-button');
          }
        });
      })
    </script>
  </body>
</html>
