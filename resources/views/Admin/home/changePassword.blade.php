@extends('Admin.layout.main')

@section('title')
<title>Đổi mật khẩu</title>
@endsection

@section('content')
<!-- Main Wrapper -->
<!-- Page Wrapper -->
<div class="page-wrapper">

    <div class="account-content">
        <div class="container">

            <div class="account-box">
                <div class="account-wrapper">
                    <div class="account-wrapper">
                        <h3 class="account-title">Đổi mật khẩu?</h3>
                        <p class="account-subtitle">Nhập mật khẩu mới</p>

                        <!-- Account Form -->
                        <form id="frm-change-pass" action="{{ url('admin/reset-pass') }}" method="POST" data-id ="{{ json_decode(Cookie::get('admin_login'))->username }}">
                            @csrf
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input name="username" class="form-control user" type="text" value="{{ json_decode(Cookie::get('admin_login'))->username }}" readonly>
                                <div class="errUser text-danger"></div>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu mới</label>
                                <input name="new_pass" class="form-control pass" type="password">
                                <div class="errPass text-danger"></div>
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input name="confirm_pass" class="form-control confirm_pass" type="password">
                                <div class="errConf text-danger"></div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Cập nhật mật khẩu</button>
                            </div>
                        </form>
                        <!-- /Account Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->
@endsection