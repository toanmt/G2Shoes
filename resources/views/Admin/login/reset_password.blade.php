@extends('Admin.login.main')
@section('content')
<!-- Main Wrapper -->
<div class="main-wrapper">
            
    <div class="account-content">
        <div class="container">
        
            <!-- Account Logo -->
            <div class="account-logo">
                <a href="index.html"><img src="{{ asset('backend/img/logo.png') }}" alt="Dreamguy's Technologies"></a>
            </div>
            <!-- /Account Logo -->
            
            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">Reset Password?</h3>
                    <p class="account-subtitle">Enter your new password to set a new password for logining</p>
                    
                    <!-- Account Form -->
                    <form id="frm-reset-pass" action="{{ url('admin/reset-pass') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" class="form-control user" type="text">
                            <div class="errUser text-danger"></div>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input name="new_pass" class="form-control pass" type="password">
                            <div class="errPass text-danger"></div>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input name="confirm_pass" class="form-control confirm_pass" type="password">
                            <div class="errConf text-danger"></div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Update Password</button>
                        </div>
                        <div class="account-footer">
                            <p>Remember your password? <a href="{{ url('admin/login') }}">Login</a></p>
                        </div>
                    </form>
                    <!-- /Account Form -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->
@endsection