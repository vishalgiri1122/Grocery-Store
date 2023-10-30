@include('website.layout.head')
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @foreach ($categories as $cat)
                        <a href="{{ url('category/'. $cat->category_name) }}" class="nav-item nav-link {{ $cat->category_name == $selectedCategory ? 'active' : '' }}">{{ $cat->category_name }}</a>
                    @endforeach
                </div>
            </nav>
        </div>

            <div class="col-lg-9">
                {{-- <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="/" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

                        <div class="navbar-nav ml-auto py-0">
                            @if(auth()->check())
                                <a href="{{ url('logout') }}" class="nav-item nav-link">Logout</a>
                            @else
                                <a href="{{ url('user/login') }}" class="nav-item nav-link">Login</a>
                            @endif
                            <a href="cart">
                                <i class="fas fa-shopping-cart text-primary mr-1 headAddtoCart"></i>
                            </a>
                        </div>
                    </div>
                </nav> --}}
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="https://img.freepik.com/premium-vector/dentist-dental-care-facebook-cover-web-banner_641154-130.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="https://static.vecteezy.com/system/resources/previews/001/254/657/original/grocery-store-online-banner-template-with-phone-groceries-and-foliage-elements-vector.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <!--<div class="container-fluid pt-5">-->
    <!--    <div class="row px-xl-5 pb-3">-->
    <!--        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">-->
    <!--            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">-->
    <!--                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>-->
    <!--                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">-->
    <!--            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">-->
    <!--                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>-->
    <!--                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">-->
    <!--            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">-->
    <!--                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>-->
    <!--                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">-->
    <!--            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">-->
    <!--                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>-->
    <!--                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- Featured End -->


    <!-- Categories Start -->
    <!--<div class="container-fluid pt-5">-->
    <!--    <div class="row px-xl-5 pb-3">-->
    <!--        @foreach ($categories as $cat)-->
    <!--        <div class="col-lg-4 col-md-6 pb-1">-->
    <!--            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">-->
    <!--                <p class="text-right">{{ $cat->products_count }} Products</p>-->
    <!--                <a href="" class="cat-img position-relative overflow-hidden mb-3">-->
    <!--                    <img class="img-fluid" src="{{ asset('assets/admin/category_images/' . $cat->image ) }}" alt="">-->
    <!--                </a>-->
    <!--                <h5 class="font-weight-semi-bold m-0">{{ $cat->category_name }}</h5>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        @endforeach-->
    <!--    </div>-->
    <!--</div>-->
    <!-- Categories End -->


    <!-- Offer Start -->
    <!--<div class="container-fluid offer pt-5">-->
    <!--    <div class="row px-xl-5">-->
    <!--        <div class="col-md-6 pb-4">-->
    <!--            <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">-->
    <!--                <img src="img/offer-1.png" alt="">-->
    <!--                <div class="position-relative" style="z-index: 1;">-->
    <!--                    <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>-->
    <!--                    <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>-->
    <!--                    <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-md-6 pb-4">-->
    <!--            <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">-->
    <!--                <img src="img/offer-2.png" alt="">-->
    <!--                <div class="position-relative" style="z-index: 1;">-->
    <!--                    <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>-->
    <!--                    <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>-->
    <!--                    <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">{{ $selectedCategory }} Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <a href="{{ url("product_detail/" . $product->id) }}">
                        <img class="img-fluid w-100" src="{{ asset('assets/admin/product_images/' . $product->image) }}" alt="thumbnail">
                        </a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <a href="{{ url("product_detail/" . $product->id) }}">
                        <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                        </a>
                        <div class="d-flex justify-content-center">
                            <h6>${{ $product->price }}</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{ url("product_detail/" . $product->id) }}">
                            </i>View Detail
                        </a>
                    <form method="post" action="{{ url('add_to_cart') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <button type="submit" style="background: transparent; border: 0">
                            <a></a>
                            <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart
                        </a>
                    </button>
                    </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
    <!--<div class="container-fluid bg-secondary my-5">-->
    <!--    <div class="row justify-content-md-center py-5 px-xl-5">-->
    <!--        <div class="col-md-6 col-12 py-5">-->
    <!--            <div class="text-center mb-2 pb-2">-->
    <!--                <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>-->
    <!--                <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>-->
    <!--            </div>-->
    <!--            <form action="">-->
    <!--                <div class="input-group">-->
    <!--                    <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">-->
    <!--                    <div class="input-group-append">-->
    <!--                        <button class="btn btn-primary px-4">Subscribe</button>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </form>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- Subscribe End -->


    <!-- Products Start -->
    <!--<div class="container-fluid pt-5">-->
    <!--    <div class="text-center mb-4">-->
    <!--        <h2 class="section-title px-5"><span class="px-2">Just Arrived</span></h2>-->
    <!--    </div>-->
    <!--    <div class="row px-xl-5 pb-3">-->
    <!--        @foreach ($products as $product)-->
    <!--        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">-->
    <!--            <div class="card product-item border-0 mb-4">-->
    <!--                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">-->
    <!--                    <img class="img-fluid w-100" src="{{ asset('assets/admin/product_images/' . $product->image) }}" alt="thumbnail">-->
    <!--                </div>-->
    <!--                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">-->
    <!--                    <a href="{{ url("product_detail/" . $product->id) }}">-->
    <!--                    <h6 class="text-truncate mb-3">{{ $product->name }}</h6>-->
    <!--                    </a>-->
    <!--                    <div class="d-flex justify-content-center">-->
    <!--                        <h6>${{ $product->price }}</h6>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="card-footer d-flex justify-content-between bg-light border">-->
    <!--                    <a href="">-->
    <!--                        </i>View Detail-->
    <!--                    </a>-->
    <!--                    <a href="">-->
    <!--                        </i>Add To Cart-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        @endforeach-->
    <!--    </div>-->
    <!--</div>-->
    <!-- Products End -->





@include('website.layout.footer')
