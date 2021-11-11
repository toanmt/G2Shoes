<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Dashboard</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Image/logo/favicon.png') }}">
  
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

  <!-- Summernote CSS -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/dist/summernote-bs4.css') }}">
  
  <!-- Chart CSS -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/morris/morris.css') }}">
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
  <script src="{{ asset('backend/js/ajax_tien.js') }}"></script>
  <!-- Export To PDF -->
  <script src="{{ asset('backend/js/exportPDF.js') }}"></script>

  <!-- Summernote CSS -->
  <script src="{{ asset('backend/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
  <script>
    $('.product-description').summernote();
  </script>

  <script>
    $('.upload').change(function(e){
      if(e.target.files.length <=2){
        $('.edit-img').css('border','none');
        $('.btn-text').hide();
        $('.img-output').remove();
        for(let image of e.target.files){        
          $('.edit-img').append('<img class="img-output" src="'+URL.createObjectURL(image)+'">');
        }
      }else{
        alert('chỉ nhận được tối đa 2 ảnh');
      }

      
    });

    $('.size-check').change(function(e){
      if($(this).is(':checked')){
        $('.amount-input-'+$(this).val()).removeAttr('disabled');
      }else{
        $('.amount-input-'+$(this).val()).attr('disabled','disabled');
      } 
    });

    $('.edit-size-check').change(function(e){
      if($(this).is(':checked')){
        $('.edit-amount-input-'+$(this).val()).removeAttr('disabled');
      }else{
        $('.edit-amount-input-'+$(this).val()).val('').attr('disabled','disabled');
      } 
    });
  </script>
  <!-- Chart JS -->
  <script src="{{ asset('backend/plugins/morris/morris.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/raphael/raphael.min.js') }}"></script>
</body>
</html>