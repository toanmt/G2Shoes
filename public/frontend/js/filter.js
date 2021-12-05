$(document).ready(function () {
    $('.dropdown-item').on('click', function (e) {
        var url = $(this).data('value');
        window.location = url;
    });
    var type_list = '';
    var size_list = '';
    var price_list = '';
    $(document).on('click', '.filter', function () {
        $('.list-item').empty();
        let url = $(this).data('url');
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
        fetchCauseAgainstFilter(url, type_list, size_list, price_list);
    });
});


function fetchCauseAgainstFilter(url, type_list, size_list, price_list) {
    $.ajax({
        type: 'GET',
        url: url,
        data: {
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
                                    <a href="#" class="product-btn">Mua ngay</a>
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
                                    <a href="#" class="product-btn">Mua ngay</a>
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
                });
            }
        }
    });
}

