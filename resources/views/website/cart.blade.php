@include('website.layout.head')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <a href="{{ url('/') }}"> 
                <p class="m-0"><button class="btn btn-primary py-2 px-4" type="submit"> Back to Home </button></p>
                </a>
                <!--<p class="m-0 px-2">-</p>-->
                <!--<p class="m-0">Shopping Cart</p>-->
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">


                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($carts as $cart)
                        <tr>
                            <td class="align-middle"><img src="{{ asset("assets/admin/product_images/" . $cart->product->image) }}" alt="" style="width: 50px;"> {{ $cart->product->name }}</td>
                            <td class="align-middle" id="basicPrice{{ $cart->id }}">${{ $cart->product->price }}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto quantity-container" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus decreaseQty" id="minusBtn">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control form-control-sm bg-secondary text-center qtyInp" value="{{ $cart->qty }}" max="{{ $cart->product->in_stock }}" data-cartId="{{ $cart->id }}" data-userId="{{ $cart->user_id }}" data-maxValue="{{ $cart->product->in_stock }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus increaseQty" id="plusBtn">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle totalProductPrice" id="totalPrice{{ $cart->id }}">${{ $cart->product->price * $cart->qty }}</td>
                            <td class="align-middle">
                                <a href="{{ route("deleteCart",$cart->id) }}">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="mt-4 mb-4 text-center"> <a href="{{ url()->previous() }}" class="btn btn-outline-primary py-md-2 px-md-3">Continue shopping</a> </div>
            </div>
            <div class="col-lg-4">

                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h5 class="font-weight-bold">Total</h5>
                            <h6 class="font-weight-bold" id="subtotal">$
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                @php
                                    $total = $total + ($cart->qty * $cart->product->price);
                                @endphp
                                @endforeach
                              {{ $total }}</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        {{-- <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$160</h5>
                        </div> --}}
                        <a href="{{ url('checkout') }}">
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    @include('website.layout.footer')

    <script>
        $(document).ready(function() {
                var subtotal = 0;
                $('.increaseQty, .decreaseQty').on('click', function() {
                    // Increment the value in the input field
                var inputField = $(this).closest('.quantity-container').find('.qtyInp');
                var cartId = inputField.data('cartid');
                var userId = inputField.data('userid');
                var value = +inputField.val();
                var maxValue = inputField.data('maxvalue');
                console.log("maxValue",maxValue)
                inputField.val(value);

                //

                inputField.trigger('change');
                // Retrieve the CSRF token from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                var updateCartUrl = '{{ route("updateCart") }}';
                // Send an Ajax request to update the cart
                $.post({
                    url: updateCartUrl,
                    data: { quantity: value,maxValue: maxValue, id: cartId, userId: userId, _token: csrfToken }, // Include CSRF token
                    type: "post",
                    success: function(response) {
                        console.log("response",response.carts);
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle errors here
                        console.error('Error: ' + errorThrown);
                    }
                });
            });

            $('.qtyInp').on('change', function() {

                var cartId = $(this).data('cartid'); // Note the lowercase 'cartid'
                var qty = $(this).val();

                // for db update
                var inputField = $(this).closest('.quantity-container').find('.qtyInp');
                var userId = inputField.data('userid');
                console.log("inputField",inputField)
                var cartId = inputField.data('cartid');
                console.log("cartId",cartId);
                var value = +inputField.val();
                var maxValue = inputField.data('maxvalue');
                console.log("maxValue",maxValue)
                inputField.val(value);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                var updateCartUrl = '{{ route("updateCart") }}';
                //
                let maximumValue = parseInt(maxValue);
                console.log("inputField2",inputField)
                if (qty > parseInt(maximumValue)) {
                    $(inputField).val(maximumValue);
                    qty = maximumValue
                    value = maximumValue
                    console.log("maximumValue2",maximumValue)
                }
                var updatedTotal = +document.getElementById(`basicPrice${cartId}`).innerHTML.slice(1) * +qty;
                document.getElementById(`totalPrice${cartId}`).innerHTML = updatedTotal;
                console.log(
                    "updatedTotal",
                    updatedTotal
                );

                // Send an Ajax request to update the cart
                $.post({
                    url: updateCartUrl,
                    data: { quantity: value,maxValue: maxValue, id: cartId, userId: userId, _token: csrfToken }, // Include CSRF token
                    // dataType: 'json',
                    type: "post",
                    success: function(response) {
                        var total = 0;
                        console.log("response",response.carts);
                        var carts = response.carts;
                        for(var i = 0; i<carts.length; i++){
                            if (carts[i].qty > carts[i].product.in_stock) {
                                carts[i].qty = carts[i].product.in_stock
                            }
                            total = total + (carts[i].product.price * carts[i].qty)
                            console.log("total",total)
                        }
                        $('#subtotal').text('$ ' + total.toFixed(2)); // Assuming you want two decimal places
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle errors here
                        console.error('Error: ' + errorThrown);
                    }
                });
            });

            });

    </script>
