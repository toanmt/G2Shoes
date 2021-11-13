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
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
  href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap"
  rel="stylesheet"
  />
  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}" />
  <!-- JQUERY -->
  <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
</head>
<body>
  @include('User.layout.header')
  @include('User.layout.menu')
  <main class="main">
    @yield('content')
  </main>
  @include('User.layout.footer')
  <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>
