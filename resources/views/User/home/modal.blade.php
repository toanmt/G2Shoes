<div class="modal js-modal">
  <div class="modal-container js-modal-container">
    <div class="modal-close js-modal-close">
      <span>
        <i class="bx bx-x"></i>
      </span>
    </div>
    <main class="modal-main">
      <section class="product-details">
        <div class="product-details__container">
          <div class="product-details-content">
            <div class="product-details-image">
              <div class="product-details-gallery" id="product-quickview-dots"></div>
              <div class="product-details-slider">
                <div class="slider-main" id="product-quickview-image"></div>
              </div>
            </div>
          </div>
          <div class="product-details-infomation">
            <div class="product-details-infomation__title">
              <div class="product-details-infomation__name">
                <span id="product-quickview-name"></span>
              </div>
              <div class="product-details-infomation__sku">
                SKU: <span id="product-quickview-id"></span>
                <div id="product-quickview-noti"></div>
              </div>
            </div>
            <div class="product-details-infomation__price">
              <span class="product-price__new" id="product-quickview-price"></span>
              <span class="product-price_discount" id="product-quickview-new"></span>
              <span class="product-price__old" id="product-quickview-old"></span>
              <div id="product-quickview-discount"></div>
            </div>
            <div class="product-details-infomation__size">
              <div class="select-size"></div>
            </div>
            <div class="product-details-infomation__quantity">
              <button class="btn-quantity btn-minus">-</button>
              <input type="text" value="1" name="product_quantity" min="1" max="20" step="1" class="quantity-box" id="product-quantity">
              <button class="btn-quantity btn-plus">+</button>
            </div>
            <div class="product-details-infomation__action">
              <a href="#" class="btn-action add-to-cart add_to_cart">Thêm vào giỏ</a>
              <a href="#" class="btn-action buy-now buy_now">Mua ngay</a>
            </div>
            <a href="{{URL::to('/contact')}}" class="btn-action support">
              Nhấn vào đây để hỗ trợ nhanh nhất
            </a>
          </div>
        </div>
      </section>
    </main>
  </div>
</div>
<script src="{{ asset('frontend/js/modal.js') }}"></script>