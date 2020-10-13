<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield("title")</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('backend/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b></a>
    </div>
    <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if(session('error'))
                    <p class="alert alert-danger">{{ session('error') }}</p>
                @endif
                <form action="{{ route('admin.checklogin') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    <b>Remember Me</b>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/js/adminlte.js')}}"></script>
</body>
</html>

