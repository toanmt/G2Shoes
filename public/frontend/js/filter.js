$(document).ready(function() {
    $(document).on('click', '.size_checkbox', function () {
        var ids = [];

        var counter = 0;
        $('.size_checkbox').each(function () {
            if ($(this).is(":checked")) {
                ids.push($(this).attr('size-id'));
                counter++;
            }
        });

        if (counter == 0) {
            $('.list-item').empty();
            $('.list-item').append('No Data Found');
        } else {
            fetchCauseAgainstCategory(ids);
        }
    });
});

function fetchCauseAgainstCategory(id) {

    $('.list-item').empty();
    $.ajax({
        type: 'GET',
        url: location.origin + location.pathname + '/filter/' + id,
        success: function (response) {
            let responses = response
            .map(v => v['id'])
            .map((v, i, array) => array.indexOf(v) === i && i)
            .filter(v => response[v])
            .map(v => response[v]);

            console.log(responses);
            $('.list-item').empty();
            if (responses.length == 0) {
                $('.list-item').append('No Data Found');
            } else {
                responses.forEach(product => {
                    if (product.discount > 0) {
                        $('.list-item').append(`
                        <div class="product-item">
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
                        <div class="product-item">
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