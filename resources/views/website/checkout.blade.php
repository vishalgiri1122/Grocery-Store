@include('website.layout.head')
<style>
    .searchForm{
        display: none;
    }
    .form-control,.form-control:focus{
        border: 1px solid #000;
    }
</style>
    <!-- Topbar End -->
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <a href="{{ url('/') }}"> 
                <p class="m-0"><button class="btn btn-primary py-2 px-4" type="submit"> Back to Home </button></p>
                </a>
                <!--<p class="m-0 px-2">-</p>-->
                <!--<p class="m-0">Checkout</p>-->
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <form action="{{ url("stripe1") }}" method="post" id="checkout_form">
                @csrf
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" value="{{ $user->name }}" readonly>
                            @error('fname')
                                <span class="text-danger d-block mt-2"> {{ $message }} </span>
                            @enderror
                        </div>
                        <!--<div class="col-md-6 form-group">-->
                        <!--    <label>Last Name</label>-->
                        <!--    <input class="form-control" type="text" name="lname">-->
                        <!--    @error('lname')-->
                        <!--        <span class="text-danger d-block mt-2"> {{ $message }} </span>-->
                        <!--    @enderror-->
                        <!--</div>-->
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" name="email" value="{{ $user->email }}" readonly>
                            @error('email')
                                <span class="text-danger d-block mt-2"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" name="phone">
                            @error('phone')
                                <span class="text-danger d-block mt-2"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address">
                            @error('address')
                                <span class="text-danger d-block mt-2"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Apartment</label>
                            <input class="form-control" type="text" name="apartment">
                            @error('apartment')
                                <span class="text-danger d-block mt-2"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" name="country">
                                <option selected>Australia</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" value="Brisbane" name="state" readonly>
                            @error('state')
                                <span class="text-danger d-block mt-2"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Postal Code</label>
                            <input class="form-control" type="text" name="postal_code">
                            @error('postal_code')
                                <span class="text-danger d-block mt-2"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        @foreach($carts as $cart)
                        <div class="d-flex justify-content-between">
                            <p>{{ $cart->product->name }} x {{$cart->qty}}</p>
                            <p>${{ $cart->product->price * $cart->qty }}</p>
                        </div>
                        @endforeach
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                @php
                                    $total = $total + ($cart->qty * $cart->product->price);
                                @endphp
                                @endforeach
                              {{ $total }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="stripe_payment" checked>
                                <label class="custom-control-label" for="stripe_payment">Stripe</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="on_delivery">
                                <label class="custom-control-label" for="on_delivery">On delivery</label>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- Checkout End -->


   @include('website.layout.footer')


   <script>
    const form = document.getElementById("checkout_form");
    const domainName = window.location.origin;
    document.getElementById("stripe_payment").addEventListener('click',()=>{
        form.action = `${domainName}/stripe1`;
    })
    document.getElementById("on_delivery").addEventListener('click',()=>{
        form.action = `${domainName}/on_delivery`;
    })
   </script>
