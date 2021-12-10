@extends('Admin.login.main')
@section('content')
@if (session('message'))
<script>alert("<?php echo session('message'); ?>");</script>
@endif
<!-- Main Wrapper -->
<div class="main-wrapper">
    <div class="account-content">
        <div class="container">

            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">Login</h3>
                    <p class="account-subtitle">Access to our dashboard</p>

                    <!-- Account Form -->
                    <form id="loginForm" name="loginForm" action="{{ url('admin/login') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control user" name="name" type="text">
                            <div class="errUser text-danger"></div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label>Password</label>
                                </div>
                            </div>
                            <input class="form-control pass" name="password" type="password">
                            <div class="errPass text-danger"></div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Login</button>
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
