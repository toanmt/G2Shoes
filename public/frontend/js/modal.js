$(document).ready(function () {

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

    });

    $('.btn-quantity').off().click(function (e) {
      e.preventDefault();
      let qty = $(this).parents('.product-details-infomation__quantity').find('.quantity-box');
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
      }
    });

    $('.product-quickview').off().click(function(e) {
        e.preventDefault();
        var product_id = $(this).data('id_product');
        var _token = $('input[name="_token"]').val();
        var url = location.origin;
        $.ajax({
          url: location.origin + "/quickview",
          method: "POST",
          dataType: "JSON",
          data: {product_id: product_id, _token: _token, url: url},
          success: function(data) {
            $('#product-quickview-name').html(data.product_name);
            $('#product-quickview-id').html(data.product_id);
            const currencyFormat = Intl.NumberFormat('en-US');
            if(data.product_discount > 0) {
              var price_new = data.product_price - data.product_price * data.product_discount/100;
              $('#product-quickview-new').html(currencyFormat.format(price_new)+"₫");
              $('#product-quickview-old').html(currencyFormat.format(data.product_price)+"₫");
              $('#product-quickview-discount').html(data.product_discount_display);
              $('#product-quickview-price').html('');
            } else {
              $('#product-quickview-price').html(currencyFormat.format(data.product_price)+"₫");
              $('#product-quickview-discount').html('');
              $('#product-quickview-old').html('');
              $('#product-quickview-new').html('');
            }
            $('.select-size').html(data.product_sizes);
            $('#product-quickview-dots').html(data.product_dots);
            $('#product-quickview-image').html(data.product_images);
            $('.product-details-infomation__action').html(`<a href="#" class="btn-action add-to-cart add_to_cart">Thêm vào giỏ</a>
            <a href="#" class="btn-action buy-now buy_now">Mua ngay</a>
            <input type="hidden" name="product_id" value="${data.product_id}">`);
    
            if(data.product_size.length == 0) {
              $('.product-details-infomation__size').remove();
              $('#product-quickview-noti').empty();
              $('#product-quickview-noti').html('<span class="product-details__noti">Tình trạng: <strong>Hết hàng</strong></span>');
            }
            if(data.product_size.length > 0) {
              $('#product-quickview-noti').empty();
    
              // Choose default size
              if(document.querySelector('.size-item')) {
                $('.select-size__list').find('.size-item')[0].classList.add("active");
                $('.select-size__list').find('input[name="product_size"]')[0].checked = true;
              }
              $('#product-quickview-noti').html('<span class="product-details__noti">Tình trạng: <strong>Còn hàng</strong></span>')
            }
    
            $('.add_to_cart').off().click(function (e) {
              e.preventDefault();
              const modal = document.querySelector('.modal-main');
              if(modal.querySelector('.product-details-infomation')) {
                let id = $(this).closest('.product-details-infomation').find('input[name="product_id"]').val();
                let size = $(this).closest('.product-details-infomation').find('input[name="product_size"]:checked').val();
                let quantity = $(this).closest('.product-details-infomation').find('input[name="product_quantity"]').val();
                addToCart(location.origin + "/add-to-cart", id, size, quantity);
              }
            });

            $('.buy_now').off().click(function (e) {
              e.preventDefault();
              const modal = document.querySelector('.modal-main');
              if(modal.querySelector('.product-details-infomation')) {
                let id = $(this).closest('.product-details-infomation').find('input[name="product_id"]').val();
                let size = $(this).closest('.product-details-infomation').find('input[name="product_size"]:checked').val();
                let quantity = $(this).closest('.product-details-infomation').find('input[name="product_quantity"]').val();
                addToCart(location.origin + "/add-to-cart", id, size, quantity, 1);
              }
            });
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
});  