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
              </div>
            </div>
            <div class="product-details-infomation__price">
              <span class="product-price__new" id="product-quickview-new"></span>
              <span class="product-price__old" id="product-quickview-old"></span>
            </div>
            <div class="product-details-infomation__size">
              <div class="select-size"></div>
            </div>
            <div class="product-details-infomation__quantity">
              <button class="btn-quantity btn-minus">-</button>
              <input
              type="text"
              name=""
              value="1"
              min="1"
              class="quantity-box"
              id="product-quantity"
              />
              <button class="btn-quantity btn-plus">+</button>
            </div>
            <div class="product-details-infomation__action">
              <a href="" class="btn-action add-to-cart">Thêm vào giỏ</a>
              <a href="" class="btn-action buy-now">Mua ngay</a>
            </div>
            <a href="" class="btn-action support">
              Nhấn vào đây để hỗ trợ nhanh nhất
            </a>
          </div>
        </div>
      </section>
    </main>
  </div>
</div>

<script type="text/javascript">
  $('.product-quickview').click(function() {
    var product_id = $(this).data('id_product');
    var _token = $('input[name="_token"]').val();
    var url = location.origin;
    $.ajax({
      url: "{{url('/quickview')}}",
      method: "POST",
      dataType: "JSON",
      data: {product_id: product_id, _token: _token, url: url},
      success: function(data) {
        $('#product-quickview-name').html(data.product_name);
        $('#product-quickview-id').html(data.product_id);
        if(data.product_discount > 0) {
          var price_new = data.product_price - data.product_price * data.product_discount/100;
          $('#product-quickview-new').html(price_new);
          $('#product-quickview-old').html(data.product_price);
        } else {
          $('#product-quickview-new').html(data.product_price);
          $('#product-quickview-old').html('');
        }
        $('.select-size').html(data.product_sizes);
        $('#product-quickview-dots').html(data.product_dots);
        $('#product-quickview-image').html(data.product_images);

        //handle slider
        const sliderMain = document.querySelector("#product-quickview-image");
        const sliderImgs = document.querySelectorAll(".slider-image");
        const sliderItem = document.querySelector(".quickview-slider");
        const sliderItemWidth = sliderItem.offsetWidth;
        let positionX = 0;

        sliderImgs[0].classList.add("active");
        [...sliderImgs].forEach((item) => {
          item.addEventListener("click", (e) => {
            document.querySelector(".slider-image.active").classList.remove("active");
            e.target.classList.add("active");
            const slideIndex = parseInt(e.target.dataset.index);
            positionX = -1 * slideIndex * sliderItemWidth;
            sliderMain.style = `transform: translateX(${positionX}px)`;
          });
        });

        //select size of shoes
        const sizeElm = document.querySelectorAll(".size-item");
        [...sizeElm].forEach((elm) =>
          elm.addEventListener("click", (e) => {
            [...sizeElm].forEach((item) => item.classList.remove("active"));
            e.target.classList.add("active");
          })
          );
          }
        });
  });
</script>
