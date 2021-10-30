<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="description" content="Smarthr - Bootstrap Admin Template">
  <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
  <meta name="author" content="Dreamguys - Bootstrap Admin Template">
  <meta name="robots" content="noindex, nofollow">
  <title>Dashboard</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/img/favicon.png') }}">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
  
  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
  
  <!-- Lineawesome CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/line-awesome.min.css') }}">

  <!-- Select2 CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }}">

  <!-- Datatable CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap4.min.css') }}">

  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
  
</head>

<body>
  <!-- Main Wrapper -->
  <div class="main-wrapper">
    @include('Admin.layout.header')

    @include('Admin.layout.menu')

    @yield('content')
  </div>
  <!-- /Main Wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('backend/js/jquery-3.5.1.min.js') }}"></script>

  <script>
    $('.upload').change(function(e){
      $('.output').attr('src',URL.createObjectURL(e.target.files[0]));
    });
  </script>
  <!-- Bootstrap Core JS -->
  <script src="{{ asset('backend/js/popper.min.js') }}"></script>
  <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

  <!-- Slimscroll JS -->
  <script src="{{ asset('backend/js/jquery.slimscroll.min.js') }}"></script>

  <!-- Select2 JS -->
  <script src="{{ asset('backend/js/select2.min.js') }}"></script>

  <!-- Datatable JS -->
  <script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/js/dataTables.bootstrap4.min.js') }}"></script>
  
  <!-- Custom JS -->
  <script src="{{ asset('backend/js/app.js') }}"></script>

  <!-- Validate Form -->
  <script src="{{ asset('backend/js/validateForm.js') }}"></script>

  <!-- Datetimepicker JS -->
  <script src="{{ asset('backend/js/moment.min.js') }}"></script>
  <script src="{{ asset('backend/js/bootstrap-datetimepicker.min.js') }}"></script>

  <!-- Ajax -->
  <script src="{{ asset('backend/js/ajax.js') }}"></script>
  <!-- Export To PDF -->
  <script src="{{ asset('backend/js/exportPDF.js') }}"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $('.product-description').summernote();
  </script>
</body>
</html>