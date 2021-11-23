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
            <a href="#" class="payment-header__title">
              <h4>g2 shoes</h4>
            </a>
            <ul class="payment-nav">
              <li><a href="#">Giỏ hàng</a></li>
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
                <a href="#" class="form-cart">Giỏ hàng</a>
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
                    >40000</label
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
                  <label for="payment-bank">Chuyển khoản qua ngân hàng</label>
                </div>
                <div class="payment-content__infor payment-banking">
                  Chuyển khoản qua số tài khoản:
                </div>
              </div>
            </div>
            <div class="form-direct">
              <a href="#" class="form-cart">Quay lại thông tin giao hàng</a>
              <a href="{{ url('order') }}" class="form-submit" id="payment-button">Hoàn tất đơn hàng</a>
            </div>
          </div>
          <div class="payment-footer">Powered by G2 SHOES</div>
        </div>
        <div class="payment-order">
          <div class="payment-product">
            <table class="payment-product__table">
              <tbody>
                <tr class="product">
                  <td class="product-image">
                    <div class="product-thumbnail">
                      <img src="{{ asset('Image/adidas_superstar1_anh1.webp') }}" alt="" />
                    </div>
                    <span class="product-qty">1</span>
                  </td>
                  <td class="product-desc">
                    <span class="product-name"
                      >NIKE AIR FORCE 1 SHADOW CRIMSON TINT
                    </span>
                    <span class="product-size">36.5</span>
                  </td>
                  <td class="product-price">5,780,000₫</td>
                </tr>
                <tr class="product">
                  <td class="product-image">
                    <div class="product-thumbnail">
                      <img src="{{ asset('Image/adidas_superstar2_anh1.webp') }}" alt="" />
                    </div>
                    <span class="product-qty">2</span>
                  </td>
                  <td class="product-desc">
                    <span class="product-name"
                      >NIKE AIR FORCE 1 SHADOW CRIMSON TINT
                    </span>
                    <span class="product-size">38.5</span>
                  </td>
                  <td class="product-price">4,650,000₫</td>
                </tr>
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
              <span>13,940,000đ</span>
            </div>
            <div class="payment-price__container">
              <span class="payment-price__title">Phí vận chuyển:</span>
              <span>40,000đ</span>
            </div>
            <div class="payment-voucher__container"></div>
            <div class="payment-price__container">
              <span class="payment-price__title">Tổng tiền: </span>
              <span>13,940,000₫</span>
              <input type="hidden" id="total_usd" value="<?php echo 13940000/22650; ?>">
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="{{ asset('frontend/js/payment.js') }}"></script>

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
                $('.payment-voucher__container').empty();
                $('.payment-voucher__container').append('<span class="payment-price__title">Giảm giá:</span><span>'+data.voucher_percent+'%</span>');
            }

          });
        })

        $('#form-infor').submit(function(){
            $.post($(this).attr('action'),$(this).serialize(),function(data){});
        });
        $('.input-radio').click(function(){
          if($(this).val() == 0){
            $('#payment-button').show();
            $('.payment-banking').empty().text('Chuyển khoản qua số tài khoản:');
            $('#payment-button').click(function(e){
                e.preventDefault();
              $.ajax({
                url: location.origin+'/order',
                type: 'GET',
                data: {'status':0},
                success: function(data){
                  alert(data.message);
                  window.location.href = location.origin;
                }
              });
            });
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
