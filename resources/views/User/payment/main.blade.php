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
            <form action="" class="form" method="POST" id="form-infor">
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
                    class="input-radio"
                  />
                  <img src="{{ asset('frontend/img/others/other.svg') }}" alt="" />
                  <label for="payment-bank">Chuyển khoản qua ngân hàng</label>
                </div>
                <div class="payment-content__infor">
                  Chuyển khoản qua số tài khoản:
                </div>
              </div>
            </div>
            <div class="form-direct">
              <a href="#" class="form-cart">Quay lại thông tin giao hàng</a>
              <button class="form-submit">Hoàn tất đơn hàng</button>
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
            <form action="" class="form-voucher" method="GET">
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
                <button class="form-submit">Sử dụng</button>
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
            <div class="payment-price__container">
              <span class="payment-price__title">Tổng tiền: </span>
              <span>13,940,000₫</span>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="{{ asset('frontend/js/payment.js') }}"></script>
  </body>
</html>
