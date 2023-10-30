@php
    $user = Auth::user();

@endphp
<script>
    @if(Session::has('success'))
   toastr.options = {
   "closeButton": true,
   "progressBar": true
}
   toastr.success("{{ (session('success')) }}")
@endif
  </script>

  <style>
    .icon{
        max-width: 25px;
        margin-right: 10px;
    }
    .navbar-sidebar .navbar__list li.active > a {
        color: #5cb85c;
        font-weight: 700;
        }
  </style>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{ url('/') }}">
                            <img src="{{ asset('assets/admin/images/icon/logo.png') }}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        {{-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li> --}}
                        <li>
                            <a href="#">
                                <img src="{{ asset("assets/admin/>images/icon/categories.png") }}" alt="icon" /> Categories</a>
                        </li>
                        <li>
                        <li>
                            <a href="{{ url('products') }}">
                                <i class="fas fa-chart-bar"></i>Products</a>
                        </li>
                        <li>
                            <a href="{{ url('orders') }}">
                                <i class="fas fa-chart-bar"></i> Orders
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('banner') }}">
                                <i class="fas fa-chart-bar"></i> Banner
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin_pic') }}">
                                <i class="fas fa-chart-bar"></i> Admin picture
                            </a>
                        </li>
                        </ul>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/admin/images/icon/logo.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        {{-- <li class="{{ Request::is('dashboard*') ? 'active has-sub' : '' }}">
                            <a href="{{ url('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li> --}}
                        <li class="{{ Request::is('categories*') ? 'active has-sub' : '' }}">
                            <a href="{{ url('categories') }}">
                                <img class="icon" src="{{ asset("assets/admin/images/icon/categories.png") }}" alt="icon"/> Categories
                            </a>
                        </li>
                        <li class="{{ Request::is('products*') ? 'active has-sub' : '' }}">
                            <a href="{{ url('products') }}">
                                <img class="icon" src="{{ asset("assets/admin/images/icon/products.png") }}" alt="icon"/> Products
                            </a>
                        </li>
                        <li class="{{ Request::is('orders*') ? 'active has-sub' : '' }}">
                            <a href="{{ url('orders') }}">
                                <img class="icon" src="{{ asset("assets/admin/images/icon/orders.png") }}" alt="icon"/> Orders
                            </a>
                        </li>
                        <li class="{{ Request::is('banner*') ? 'active has-sub' : '' }}">
                            <a href="{{ url('banner') }}">
                                <img class="icon" src="{{ asset("assets/admin/images/banner.png") }}" alt="icon"/> Banner
                            </a>
                        </li>
                        <li class="{{ Request::is('admin_pic*') ? 'active has-sub' : '' }}">
                            <a href="{{ url('admin_pic') }}">
                                <img class="icon" src="{{ asset("assets/admin/images/admin.png") }}" alt="icon"/> Admin picture
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                {{-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button> --}}
                            </form>
                            <div class="header-button">

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{ asset('assets/admin/dp/' . $user->img) }}" alt="{{ $user->name }}" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ $user->name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/admin/dp/' . $user->img) }}" alt="{{ $user->name }}" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ $user->name }}</a>
                                                    </h5>
                                                    <span class="email">{{ $user->email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ url('logout') }}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
