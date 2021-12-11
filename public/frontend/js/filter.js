// window.addEventListener('DOMContentLoaded', (event) => {
//     console.log(event);
// });

$(document).ready(function () {
    $('.dropdown-item').on('click', function (e) {
        var url = $(this).data('value');
        window.location = url;
    });
    var brand_list = '';
    var type_list = '';
    var size_list = '';
    var price_list = '';
    $(document).on('click', '.filter', function () {
        $('.list-item').empty();
        let url = $(this).data('url');
        if ($(this)[0].classList.contains('filter_brand')) {
            let ids = [];
            let counter = 0;
            $('.filter_brand').each(function () {
                if ($(this).is(":checked")) {
                    ids.push($(this).attr('filter'));
                    counter++;
                }
            });
            brand_list = '';
            brand_list += ids;
        }
        if ($(this)[0].classList.contains('filter_type')) {
            let ids = [];
            let counter = 0;
            $('.filter_type').each(function () {
                if ($(this).is(":checked")) {
                    ids.push($(this).attr('filter'));
                    counter++;
                }
            });
            type_list = '';
            type_list += ids;
        }

        if ($(this)[0].classList.contains('filter_size')) {
            let ids = [];
            let counter = 0;
            $('.filter_size').each(function () {
                if ($(this).is(":checked")) {
                    ids.push($(this).attr('filter'));
                    counter++;
                }
            });
            size_list = '';
            size_list += ids;
        }

        if ($(this)[0].classList.contains('filter_price')) {
            let ids = [];
            let counter = 0;
            $('.filter_price').each(function () {
                if ($(this).is(":checked")) {
                    ids.push($(this).attr('filter'));
                    counter++;
                }
            });
            price_list = '';
            price_list += ids;
        }
        fetchCauseAgainstFilter(url, brand_list, type_list, size_list, price_list);
    });
});


function fetchCauseAgainstFilter(url, brand_list, type_list, size_list, price_list) {
    $.ajax({
        type: 'GET',
        url: url,
        data: {
            brand_list: brand_list,
            type_list: type_list,
            size_list: size_list,
            price_list: price_list,
        },
        dataType: 'json',
        success: function (response) {
            const currencyFormat = Intl.NumberFormat('en-US');
            let responses = response
                .map(v => v['id'])
                .map((v, i, array) => array.indexOf(v) === i && i)
                .filter(v => response[v])
                .map(v => response[v]);

            $('.list-item').empty();

            if (responses.length == 0) {
                $('.list-item').append('Không có giày phù hợp!');
            } else {
                responses.forEach(product => {
                    var total_size = 0;
                    var count = 0;
                    function getProductSize(product_size, index, arr) {
                        arr[index] = product_size;
                        total_size += product_size.amount;
                        count = index;
                    }
                    product.product_size.forEach(getProductSize);
                    if(total_size == 0) {
                        $('.list-item').append(`
                        <div class="product-item zoomIn animated">
                            <div class="product-image">
                            <div class="product-noti">
                                <span class="product-noti__show product-noti__sold-out">Hết</span>
                            </div>
                                <a href="${location.origin}/product_details/${product.id}" class="product-image__link">
                                    <img src="${location.origin}/Image/${product.images[0].image_name}" alt="" />
                                    <img src="${location.origin}/Image/${product.images[1].image_name}" alt="" />
                                </a>
                                <div class="product-control">
                                    <form>
                                        <input 
                                            type="button" 
                                            name="quick-view" 
                                            class="product-btn product-quickview" 
                                            data-id_product="${product.id}" 
                                            id="product-quickview"
                                            value="Xem nhanh"
                                        >
                                    </form>
                                    <a href="#" class="product-btn">Thêm vào giỏ</a>
                                </div>
                            </div>
                            <div class="product-infor">
                                <div class="product-name">
                                    <h3>
                                        <a href="${location.origin}/product_details/${product.id}" title="${product.product_name}">${product.product_name}</a>
                                    </h3>
                                </div>
                                <div class="product-price">
                                    <p class="product-price__new">
                                        ${currencyFormat.format(product.price)}đ
                                    </p>
                                </div>
                            </div>
                        </div>
                        `);
                    }
                    for(i = 0; i <= count; i++) {
                        if(product.product_size[i].amount > 0) {
                            if (product.discount > 0) {
                                $('.list-item').append(`
                                <div class="product-item zoomIn animated">
                                    <div class="product-image">
                                    <div class="product-noti">
                                        <span class="product-noti__show product-noti__sale">-${product.discount}%</span>
                                    </div>
                                        <a href="${location.origin}/product_details/${product.id}" class="product-image__link">
                                            <img src="${location.origin}/Image/${product.images[0].image_name}" alt="" />
                                            <img src="${location.origin}/Image/${product.images[1].image_name}" alt="" />
                                        </a>
                                        <div class="product-control">
                                            <form>
                                                <input 
                                                    type="button" 
                                                    name="quick-view" 
                                                    class="product-btn product-quickview" 
                                                    data-id_product="${product.id}" 
                                                    id="product-quickview"
                                                    value="Xem nhanh"
                                                >
                                            </form>
                                            <a href="#" class="product-btn add-to-cart">Thêm vào giỏ</a>
                                            <div class="add_to_cart_fields">
                                                <input type="hidden" name="product_id" value="${product.id}">
                                                <input type="hidden" name="product_size" value="${product.product_size[i].size_id}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-infor">
                                        <div class="product-name">
                                            <h3>
                                                <a href="${location.origin}/product_details/${product.id}" title="${product.product_name}">${product.product_name}</a>
                                            </h3>
                                        </div>
                                        <div class="product-price">
                                        <p class="product-price__new">
                                        <span class="product-price_discount">
                                          ${currencyFormat.format(product.price - (product.price * product.discount)/100)}đ
                                        </span>
                                        <span class="product-price__old">${currencyFormat.format(product.price)}đ</span>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                `);
                            } else {
                                $('.list-item').append(`
                                <div class="product-item zoomIn animated">
                                    <div class="product-image">
                                        <a href="${location.origin}/product_details/${product.id}" class="product-image__link">
                                            <img src="${location.origin}/Image/${product.images[0].image_name}" alt="" />
                                            <img src="${location.origin}/Image/${product.images[1].image_name}" alt="" />
                                        </a>
                                        <div class="product-control">
                                            <form>
                                                <input 
                                                    type="button" 
                                                    name="quick-view" 
                                                    class="product-btn product-quickview" 
                                                    data-id_product="${product.id}" 
                                                    id="product-quickview"
                                                    value="Xem nhanh"
                                                >
                                            </form>
                                            <a href="#" class="product-btn add-to-cart">Thêm vào giỏ</a>
                                            <div class="add_to_cart_fields">
                                                <input type="hidden" name="product_id" value="${product.id}">
                                                <input type="hidden" name="product_size" value="${product.product_size[i].size_id}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-infor">
                                        <div class="product-name">
                                            <h3>
                                                <a href="${location.origin}/product_details/${product.id}" title="${product.product_name}">${product.product_name}</a>
                                            </h3>
                                        </div>
                                        <div class="product-price">
                                            <p class="product-price__new">
                                                ${currencyFormat.format(product.price)}đ
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                `);
                            }
                            break;
                        }
                    }
                    

                });

                $(".quantity-box").off().change(function (e) {
                    e.preventDefault();
                    let urlUpdateCart = $('.update_cart_url').data('url');
                    let id = $(this).closest('.item-quan').find('.item-quan-fields').data('id');
                    let qty = $(this).closest('.item-quan').find('.quantity-box');
                    let quantity = parseInt(qty.val());
              
                    if (quantity.length == 0) {
                        Swal.fire({title: 'Số lượng nhập không được để trống!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
                    }
                    else if (isNaN(quantity)) {
                        Swal.fire({title: 'Số lượng nhập không được phép chứa ký tự khác số!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
                    }
                    else if (parseInt(quantity) < 1) {
                        Swal.fire({title: 'Số lượng nhập không được bé hơn 1!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
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
                    }
                  });

                      // Add to cart
                        $('.add-to-cart').off().click(function (e) {
                            e.preventDefault();
                            if(document.querySelector('.product-control')) {
                                let id = $(this).closest('.product-control').find('input[name="product_id"]').val();
                                let size = $(this).closest('.product-control').find('input[name="product_size"]').val();
                                addToCart(location.origin + "/add-to-cart", id, size, 1);
                            }
                            else if(document.querySelector('.product-details-infomation')) {
                                let id = $(this).closest('.product-details-infomation').find('input[name="product_id"]').val();
                                let size = $(this).closest('.product-details-infomation').find('input[name="product_size"]:checked').val();
                                let quantity = $(this).closest('.product-details-infomation').find('input[name="product_quantity"]').val();
                                addToCart(location.origin + "/add-to-cart", id, size, quantity);
                            }
                        });
                        
                        $('.buy-now').off().click(function (e) {
                            e.preventDefault();
                            const productDetails = document.querySelector('.product-details');
                            if(productDetails.querySelector('.product-details-infomation')) {
                                let id = $(this).closest('.product-details-infomation').find('input[name="product_id"]').val();
                                let size = $(this).closest('.product-details-infomation').find('input[name="product_size"]:checked').val();
                                let quantity = $(this).closest('.product-details-infomation').find('input[name="product_quantity"]').val();
                                addToCart(location.origin + "/add-to-cart", id, size, quantity, 1);
                            }
                        });
    
                    //open/hide modal product
                    if (document.querySelector(".js-modal")) {
                        const btnInfor = document.querySelectorAll(".product-quickview");
                        const modal = document.querySelector(".js-modal");
                        const modalContainer = document.querySelector(".js-modal-container");
                        const modalClose = document.querySelector(".js-modal-close");
                
                        [...btnInfor].forEach((btn) => {
                        btn.addEventListener("click", () => {
                            modal.classList.add("open");
                        });
                        });
                
                        modalClose.addEventListener("click", () => {
                        modal.classList.remove("open");
                        });
                
                        modal.addEventListener("click", () => {
                        modal.classList.remove("open");
                        });
                
                        modalContainer.addEventListener("click", (e) => {
                        e.stopPropagation();
                        });
                    }

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
            }
        }
    });
}

