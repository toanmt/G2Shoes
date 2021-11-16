function filter(name) 
    {
        $(document).on('click', '.' + name, function () {
            $('.list-item').empty();

            let ids = [];
            let url = $(this).data('url');
            
            let counter = 0;
            $('.' + name).each(function () {
                if ($(this).is(":checked")) {
                    ids.push($(this).attr('filter'));
                    counter++;
                }
            });

            url += '&'+ $(this).data('search') + '=' + encodeURIComponent(ids);

            if (counter == 0) {
                fetchCauseAgainstFilter($(this).data('url'));
            } else {
                fetchCauseAgainstFilter(url);
            }
        });

    };
$(document).ready(function() {
    filter('filter_checkbox');
    filter('filter_price');
});


function fetchCauseAgainstFilter(url) {

    $.ajax({
        type: 'GET',
        url: url,
        success: function (response) {
            let responses = response
            .map(v => v['id'])
            .map((v, i, array) => array.indexOf(v) === i && i)
            .filter(v => response[v])
            .map(v => response[v]);

            if (responses.length == 0) {
                $('.list-item').append('Không có giày phù hợp!');
            } else {
                responses.forEach(product => {
                    if (product.discount > 0) {
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
                                        ${product.price}đ
                                        <span class="product-price__old">${product.price - (product.price * product.discount)/100}đ</span>
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
                                        ${product.price}đ
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

