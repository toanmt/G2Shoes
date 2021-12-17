<!-- Header -->
<div class="header">

  <!-- Logo -->
  <div class="header-left">
    <a href="" class="logo">
      <img src="{{ asset('Image/logo/logo.png') }}" width="40" height="40" alt="">
    </a>
  </div>
  <!-- /Logo -->

  <a id="toggle_btn" href="javascript:void(0);">
    <span class="bar-icon">
      <span></span>
      <span></span>
      <span></span>
    </span>
  </a>

  <!-- Header Title -->
  <div class="page-title-box">
    <h3>G2 Shoes</h3>
  </div>
  <!-- /Header Title -->

  <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

  <!-- Header Menu -->
  <ul class="nav user-menu">
    <li class="nav-item dropdown has-arrow main-drop">
      <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
        <span>{{ json_decode(Cookie::get('admin_login'))->username }}</span>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ url('admin/change-password') }}">Đổi mật khẩu</a>
        <a class="dropdown-item" href="{{ url('admin/logout') }}">Đăng xuất</a>
      </div>
    </li>
  </ul>
  <!-- /Header Menu -->
</div>
<!-- /Header -->
