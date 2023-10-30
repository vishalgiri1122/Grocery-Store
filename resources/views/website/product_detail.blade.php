@include('website.layout.head')


            {{-- <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="/" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

                    </div>
                </nav>
            </div> --}}
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Product Details</h1>
            <div class="d-inline-flex">
                <a href="{{ url('/') }}"> 
                <p class="m-0"><button class="btn btn-primary py-2 px-4" type="submit"> Back to Home </button></p>
                </a>
                <!--<p class="m-0 px-2">-</p>-->
                <!--<p class="m-0">Product Details</p>-->
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Product Details Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset("assets/admin/product_images/" . $product->image) }}" alt="Image">
                        </div>
                        <!--<div class="carousel-item">-->
                        <!--    <img class="w-100 h-100" src="{{ asset("assets/admin/product_images/" . $product->image) }}" alt="Image">-->
                        <!--</div>-->
                        <!--<div class="carousel-item">-->
                        <!--    <img class="w-100 h-100" src="{{ asset("assets/admin/product_images/" . $product->image) }}" alt="Image">-->
                        <!--</div>-->
                        <!--<div class="carousel-item">-->
                        <!--    <img class="w-100 h-100" src="{{ asset("assets/admin/product_images/" . $product->image) }}" alt="Image">-->
                        <!--</div>-->
                    </div>
                    <!--<a class="carousel-control-prev" href="#product-carousel" data-slide="prev">-->
                    <!--    <i class="fa fa-2x fa-angle-left text-dark"></i>-->
                    <!--</a>-->
                    <!--<a class="carousel-control-next" href="#product-carousel" data-slide="next">-->
                    <!--    <i class="fa fa-2x fa-angle-right text-dark"></i>-->
                    <!--</a>-->
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $product->name }}</h3>
                <h3 class="font-weight-semi-bold mb-4">Price: ${{ $product->price }}</h3>
                <p class="mb-4">{{ $product->short_desc }}</p>
                 @if(Auth::check())
                    <p class="mb-4 text-success">Available in stock
                        @if($availableForCart < 0)
                            (0)
                        @else
                            ({{ $availableForCart }})
                        @endif
                    </p>
                @else
                    <p class="mb-4 text-success">Available in stock ({{ $product->in_stock }})</p>
                @endif
                <form action="{{ url('add_to_cart') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" type="button" id="minusBtn">
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        @if(Auth::check())
                            <input type="text" class="form-control bg-secondary text-center" value=<?php if($availableForCart == 0){ echo 0; }else echo 1; ?> name="qty" max="{{ $availableForCart }}" min=1 id="qty">
                        @else
                            <input type="text" class="form-control bg-secondary text-center" value=1 name="qty" max="{{ $product->in_stock }}" min=1 id="qty">
                        @endif
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus"type="button" id="plusBtn">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        
                            <button class="btn btn-primary px-3" type="submit"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                        
                    </div>
                </form>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <!--<a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>-->
                    <!--<a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>-->
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>{{$product->desc}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($same_products as $product)
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <a href="{{ url("product_detail/" . $product->id) }}">
                            <img class="img-fluid w-100" src="{{ asset('assets/admin/product_images/' . $product->image) }}" alt="image">
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
                            <a href="{{ url("product_detail/" . $product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <!--<a href="https://grocery-store.solecube.tech/cart.html" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>-->
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

@include('website.layout.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('qty').onchange = function() {
            let maximumValue = document.getElementById('qty').getAttribute('max');
            if (parseInt(document.getElementById('qty').value) > parseInt(maximumValue)) {
                document.getElementById('qty').value = maximumValue;
            }
        };


        $('#minusBtn,#plusBtn').on('click',function(){
            let maximumValue = document.getElementById('qty').getAttribute('max');
            if (parseInt(document.getElementById('qty').value) > parseInt(maximumValue)) {
                document.getElementById('qty').value = maximumValue;
                // alert('greater')
            }
        })
        })
</script>
