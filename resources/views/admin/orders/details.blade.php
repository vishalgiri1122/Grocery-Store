@include('admin.layout.head')
@include('admin.layout.header_sidebar')
<body>
    <script>
        @if(Session::has('product_added'))
       toastr.options = {
       "closeButton": true,
       "progressBar": true
    }
       toastr.success("{{ (session('product_added')) }}")
    @endif
      </script>
    <div class="page-wrapper">

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mt-4 mb-4">
                                    <h2 class="strong"> Order Details </h2>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Country</th>
                                                <th>Username</th>
                                                <th>Address</th>
                                                <th>Apartment</th>
                                                <th>State</th>
                                                <th>Postal Code</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Product Name</th>
                                                <th>Product image</th>
                                                <th>Product price</th>
                                                <th>Quantity purchased</th>
                                                <th>Total Price</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> {{ $order->country }} </td>
                                                <td> {{ $order->username }} </td>
                                                <td> {{ $order->address }} </td>
                                                <td> {{ $order->apartment }} </td>
                                                <td> {{ $order->state }} </td>
                                                <td> {{ $order->postal_code }} </td>
                                                <td> {{ $order->email }} </td>
                                                <td> {{ $order->phone }} </td>
                                                <td> {{ $order->cart->product->name }} </td>
                                                <td> <img src="{{ asset("assets/admin/product_images/" . $order->cart->product->image) }}" alt="thumbnail" width=200> </td>
                                                <td> {{ $order->cart->product->price }} </td>
                                                <td> {{ $order->cart->qty }} </td>
                                                <td> {{ $order->cart->qty * $order->cart->product->price }} </td>
                                                <td> 
                                                @if($order->status == 'Cancelled')
                                                <button class="btn btn-danger">  Cancelled </button>
                                                @elseif ($order->status == 'Pending')
                                                <button class="btn btn-warning"> Pending </button>
                                                @else
                                                <button class="btn btn-success"> Complete </button>
                                                @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.layout.footer')
