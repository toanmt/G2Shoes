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
  <link rel='stylesheet prefetch' href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
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
  @include('User.layout.header')
  @include('User.layout.menu')
  <main class="main">
    @yield('content')
  </main>
  @include('User.layout.footer')
  <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //handle sort product
      $('.dropdown-item').on('click',function(e){
        var url = $(this).data('value');
        window.location = url;
      });

      //handle filter product
      filterData();

      function filterData() {
        var action = 'get_data';
        var size = getFilter('filter-size');
        var type = getFilter('filter-type');

        $.ajax({
          url: "app/Http/Controllers/User/BrandController.php",
          method: "POST",
          data: {action:action, size:size, type:type}
        });
      }

      function getFilter(className) {
        var filter = [];
        $('.'+className+':checked').each(function(){
          filter.push($(this).val());
        });
        return filter;
      }

      $('.filter-label').click(function(){
        filterData();
        console.log(getFilter())
      })
    });
  </script>
</body>
