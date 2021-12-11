<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>G2 SHOES - GIÀY CHÍNH HÃNG | SNEAKER AUTHENTIC</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/img/others/favicon.webp') }}" type="image/png" />
    <!-- Icon -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link rel='stylesheet prefetch' href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/pagination.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}" />
    <!-- JQUERY -->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
</head>

<body>
    <div class="response"></div>
    @include('User.layout.header')
    @include('User.layout.menu')
    <main class="main">
        @yield('content')
        @include('User.layout.gallery')
    </main>
    @include('User.layout.footer')


    {{--
        <!-- Chatbox Facebook -->
        <!-- Messenger Plugin chat Code -->
        <div id="fb-root"></div>

        <!-- Your Plugin chat code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

        <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "107854461718553");
            chatbox.setAttribute("attribution", "biz_inbox");

            window.fbAsyncInit = function () {
                FB.init({
                    xfbml: true,
                    version: 'v12.0'
                });
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script> --}}
        <script>
            function addToCart(url, id, size, quantity, redirect = 0) {
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        id: id,
                        size: size,
                        quantity: quantity,
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.code === 200) {
                            Swal.fire({title: 'Thêm sản phẩm thành công', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000});
                            $('.nav-cart__span').empty();
                            $('.nav-cart__span').append(`<a href="" class="nav-cart__qty">${data.item}</a>`);
                            if(redirect == 1) {
                                setTimeout(function () {
                                    window.location = location.origin + "/payment";
                                }, 1000);
                            }
                        }
                        else if (data.code === 400) {
                            Swal.fire({title: 'Lỗi không thêm được giỏ hàng!', text: data.message , icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
                        }
                    },
                    error: function () {
                        Swal.fire({title: 'Lỗi mạng!', icon: 'error', confirmButtonText: "OK", buttonsStyling: true});
                    }
                });
            }
        </script>
        <script src="{{ asset('frontend/js/main.js') }}"></script>
        <script src="{{ asset('frontend/js/notify.min.js') }}"></script>
        <script src="{{ asset('frontend/js/addcart.js') }}"></script>
    </body>
