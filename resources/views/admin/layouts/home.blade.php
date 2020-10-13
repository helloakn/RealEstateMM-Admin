<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('backend/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Sweet Alert --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
</head>
<body>
<div class="wrapper">
    <!--- nav-bar --->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand ml-4" href="#">
            <img src="{{asset('backend/img/logo.png')}}" alt="ehouse Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8" height="100px">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">eHouse Myanmar <br>http://www.ehousemyanmar.com.mm<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <!--- end nav-bar --->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-gray elevation-4 pt-2 side">
        <!-- Sidebar -->
        <div class="sidebar sidebar-light-gray">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 mb-3 pl-lg-4 d-flex">
                <div class="info text-center">
                    <a href="#" class="d-block"><i class="fas fa-user" style="font-size: 3em;"></i>
                        <p class="font-weight-bold text-maroon">Alexander Pierce <br>Editor</p>
                    </a>
                </div>
            </div>
            <nav class="">
                <ul class="nav nav-sidebar flex-column" data-widget="treeview">
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link language">
                            <i class="nav-icon fas fa-book text-danger"></i>
                            <p class="text-gray-dark">
                                SetUp
                            </p>
                        </a>
                    </li>

                       <li class="nav-item title">
                           <a href="{{ url("admin/") }}" class="nav-link language">
                               <i class="fas fa-user-lock nav-icon text-primary"></i>
                               <p class="text-gray-dark">Admin</p>
                           </a>
                       </li>
                       <li class="nav-item title">
                           @php $locale = session()->get('locale'); @endphp
                           <a href="{{ url('category/'.$locale) }}" class="nav-link language">
                               <i class="fas fa-house-user nav-icon text-primary"></i>
                               <p class="text-gray-dark">Category</p>
                           </a>
                       </li>
                       <!-- <li class="nav-item title">
                            <a href="#" class="nav-link language">
                                <i class="fas fa-comment-dots nav-icon text-primary"></i>
                                <p>Chat</p>
                            </a>
                        </li>
                        <li class="nav-item title">
                            <a href="#" class="nav-link language">
                                <i class="fas fa-comment-dots nav-icon text-primary"></i>
                                <p>Chat_Details</p>
                            </a>
                        </li>-->
                       <li class="nav-item title">
                           <a href="{{ url('currency/') }}" class="nav-link language">
                               <!--<i class="fas fa-money-check-alt nav-icon"></i> -->
                               <i class="fas fa-dollar-sign nav-icon text-primary"></i>
                               <p>Currency</p>
                           </a>
                       </li>
                        <!--<li class="nav-item title">
                            <a href="#" class="nav-link language">
                                <i class="far fa-heart nav-icon text-primary"></i>
                                <p>Favourites</p>
                            </a>
                        </li>-->
                        <li class="nav-item title">
                            <a href="{{ url('feature/') }}" class="nav-link language">
                                <i class="fas fa-thumbs-up nav-icon text-primary"></i>
                                <p>Feature</p>
                            </a>
                        </li>
                       <!-- <li class="nav-item title">
                            <a href="#" class="nav-link language">
                                <i class="fas fa-stream nav-icon text-primary"></i>
                                <p>Login_Histories</p>
                            </a>
                        </li>
                        <li class="nav-item title">
                            <a href="#" class="nav-link language">
                                <i class="fas fa-bell nav-icon text-primary"></i>
                                <p>Notifications</p>
                            </a>
                        </li>
                        <li class="nav-item title">
                            <a href="#" class="nav-link language">
                                <i class="fas fa-bell nav-icon text-primary"></i>
                                <p>Notification_Details</p>
                            </a>
                        </li>-->
                       <li class="nav-item title">
                           <a href="{{ url('payment/') }}" class="nav-link language">
                               <i class="fas fa-wallet nav-icon text-primary"></i>
                               <p>Payment Type</p>
                           </a>
                       </li>
                        <!--<li class="nav-item title">
                            <a href="{{ url('property/') }}" class="nav-link language">
                                <i class="far fa-circle nav-icon text-primary"></i>
                                <p>Property</p>
                            </a>
                        </li>
                        <li class="nav-item title">
                            <a href="{{ url('property_image/') }}" class="nav-link language">
                                <i class="fas fa-image nav-icon text-primary"></i>
                                <p class="">Property Image</p>
                            </a>
                        </li>
                        <li class="nav-item title">
                            <a href="{{ url('property_type/') }}" class="nav-link language">
                                <i class="fas fa-shopping-cart nav-icon text-primary"></i>
                                <p>Property Type</p>
                            </a>
                        </li>-->
                        <li class="nav-item title">
                            <a href="{{ url('room_type/') }}" class="nav-link language">
                                <i class="fas fa-store nav-icon text-primary"></i>
                                <p>Room Type</p>
                            </a>
                        </li>
                        <!--<li class="nav-item title">
                            <a href="#" class="nav-link language">
                                <i class="fas fa-search nav-icon text-primary"></i>
                                <p>Search_Filters</p>
                            </a>
                        </li>
                        <li class="nav-item title">
                            <a href="{{ url('slider/') }}" class="nav-link language">
                                <i class="fas fa-image nav-icon text-primary"></i>
                                <p>Slider</p>
                            </a>
                        </li>-->
                       <li class="nav-item title">
                           <a href="{{ url('state_division/') }}" class="nav-link language">
                               <i class="fas fa-map-marker-alt nav-icon text-primary"></i>
                               <p>State and Division</p>
                           </a>
                       </li>
                        <li class="nav-item title">
                            <a href="{{ url('street/') }}" class="nav-link language">
                                <i class="fas fa-map-marker-alt nav-icon text-primary"></i>
                                <p>Street</p>
                            </a>
                        </li>
                       <li class="nav-item title">
                           <a href="{{url('township/')}}" class="nav-link language">
                               <i class="fas fa-map-marker-alt nav-icon text-primary"></i>
                               <p>Township</p>
                           </a>
                       </li>
                        <!--<li class="nav-item title">
                            <a href="{{url('user/')}}" class="nav-link language">
                                <i class="fas fa-users nav-icon text-primary"></i>
                                <p>User</p>
                            </a>
                        </li>-->
                </ul>
                <hr>
                <ul class="nav nav-sidebar flex-column" data-widget="treeview">
                    <li class="nav-item">
                        <a href="{{ url('admin/logout') }}" class="nav-link language">
                            <i class="fas fa-sign-out-alt text-danger" style="font-size:18px;"></i>
                            <p">Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!--- end sidebar --->
    <!-- Main content -->
    <div class="content-wrapper p-lg-2">
        <section class="content">
            @yield("content")
        </section>
    </div>
    <!-- /.content -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="http://adminlte.io">ehouse.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.4
        </div>
    </footer>
</div>
    <!-- jQuery -->
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    @include("sweetalert::alert")
    <script src="/main/js/jquery-2.2.0.min.js"></script>
    
    @yield('jsScript')
</body>
</html>
