<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GROCERY - STORE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/website/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/website/css/style.css') }}" rel="stylesheet">
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- csrf token --}}
    <style>
        .cat-item .cat-img img, .product-item .product-img img {
            transition: .5s;
            height: 340px;
        }
        .headAddtoCart{
            font-size: 24px;
            cursor: pointer;
        }
        .navbar-nav.ml-auto.py-0{
            align-items: center
        }
        .navbar-nav.ml-auto.py-0{
            gap: 20px;
        }
        .btn.btn-outline-primary.py-md-2.px-md-3:hover,.fa.fa-angle-double-up:hover{
        color: #fff !important;
    }
        @media(max-width:568px){
            .cat-item .cat-img img, .product-item .product-img img {
                height: 215px;
            }

        }
    </style>
</head>

<body>
<!-- Topbar Start -->
<div class="container-fluid">

    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{ url('/') }}" class="text-decoration-none">
                <!--<h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>-->
                <img src="{{ asset('assets/website/img/grocery_logo.png') }}" alt="logo" height="90"/>
            </a>
        </div>
        <div class="col-lg-7 col-12 text-left">
            <form action="{{ url('search/some-search-value') }}" method="get" class="searchForm">
                <div class="input-group w-100">
                    <input type="text" name="slug" class="form-control" placeholder="Search products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-2">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="{{ url('/') }}" class="text-decoration-none d-block d-lg-none">
                    <!--<h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>-->
                    <img src="{{ asset('assets/website/img/grocery_logo.png') }}" alt="logo" height="90"/>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

                    <div class="navbar-nav ml-auto py-0">
                        <!--@if(auth()->check())-->
                        <!--    <a href="{{ url('logout') }}" class="nav-item nav-link"><img src="{{ asset('assets/website/img/power.png') }}" alt="login icon" width="27" /></a>-->
                        <!--@else-->
                        <!--    <a href="{{ route('user.login') }}" class="nav-item nav-link"> <img src="{{ asset('assets/website/img/user.png') }}" alt="login icon" width="27" /></a>-->
                        <!--@endif-->
                        <!--<a href="{{ url('cart') }}">-->
                        <!--    <i class="fas fa-shopping-cart text-primary mr-1 headAddtoCart"></i>-->
                        <!--</a>-->
                        <div class="dropdown">
                          <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shopping-cart text-primary mr-1 headAddtoCart"></i> 
                          </a>
                        
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            
                            <a class="dropdown-item" href="{{ url('cart') }}">  Cart</a>
                          </div>
                        </div>
                        <div class="dropdown">
                          <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(auth()->check())
                            <img src="{{ asset('assets/website/img/power.png') }}" alt="login icon" width="27" />
                            @else
                            <img src="{{ asset('assets/website/img/user.png') }}" alt="login icon" width="27" />
                            @endif 
                          </a>
                        
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              @if(auth()->check())
                            <a class="dropdown-item " href="{{ url('logout') }}" >Logout</a>
                            @else
                            <a class="dropdown-item" href="{{ route('user.login') }}" > Login</a>
                            @endif
                          </div>
                        </div>

<!--                        @if(auth()->check())-->
<!--    @if(auth()->user()->orders->count() > 0)-->
<!--        <a href="{{ url('track_order/' . auth()->user()->id) }}">-->
<!--            <img src="{{ asset('assets/website/img/delivery-truck.png') }}" alt="track order icon" width="27"/>-->
<!--        </a>-->
<!--    @endif-->
<!--@endif-->



                    </div>
                </div>
            </nav>
        </div>

    </div>
</div>
<!-- Topbar End -->
@if(Session::has('success'))
    <div class="alert alert-success mb-4" id="success-alert" style="max-width: 90%; margin: 0 auto; ">
        {{ session('success') }}
    </div>
@endif