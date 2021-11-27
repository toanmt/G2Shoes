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
    