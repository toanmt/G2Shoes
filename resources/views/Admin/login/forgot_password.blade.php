@extends('Admin.login.main')
@section('content')
    <!-- Main Wrapper -->
    <div class="main-wrapper">
            
        <div class="account-content">
            <div class="container">
                
                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Forgot Password?</h3>
                        <p class="account-subtitle">Enter your email to get a password reset link</p>
                        
                        <!-- Account Form -->
                        <form id="frm-forgot-pass" action="{{ url('admin/send-mail') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input name="email" class="form-control" type="email">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Reset Password</button>
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
