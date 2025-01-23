@extends('layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Change Password</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title color-red"><b>Change Password Info</b></h3>
                        </div>
                        <form method="POST" action="{{ route('update_password') }}" id="change_password_form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="New Password" name="password" minlength="6" maxlength="15"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input type="text" class="form-control" id="confirm_password"
                                                placeholder="Confirm Password" name="confirm_password" minlength="6"
                                                maxlength="15">
                                            <p id="error-msg" style="color:red;font-weight:600;"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-left">Update</button>
                            </div>
                            <form>
                    </div>
                    <!-- /.col-->
                </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script>
        $("#change_password_form").on('submit', function(event) {

            let password = $("#password").val();
            let confirm_password = $("#confirm_password").val();
            if (password !== confirm_password) {
                $('#error-msg').text("Password does not match");
                return false;
            }
        })
    </script>
@endsection
