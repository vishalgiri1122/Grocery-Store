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
                                    <h2 class="strong"> Orders </h2>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" id="orders">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Username</th>
                                                <th>User Email</th>
                                                <th>Shipping Address</th>
                                                <th>Product Image</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                                 <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Details
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>
                                                <td> {{ $order->id }} </td>
                                                <td> {{ $order->username }} </td>
                                                <td> {{ $order->email }} </td>
                                                <td> {{ $order->country }} </td>
                                                <td> <img src="{{ asset('assets/admin/product_images/' . $order->cart->product->image) }}" alt="thumbnail" width=200> </td>
                                                <td> {{ $order->cart->qty }} </td>
                                                <td> {{ $order->cart->qty * $order->cart->product->price }} </td>
                                                <td>
                                                <select class="status-select" data-item-id="{{ $order->id }}">
                                                    <option value="" selected> Select </option>
                                                    <option value="Complete" @if($order->status == 'Complete') selected @endif> Complete </option>
                                                </select>
                                                </td>
                                                <td>
                                                    <a href="{{ url("order_details/" . $order->id) }}">
                                                        <button class="btn btn-success">See More Details</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
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



    <script>
        $(document).ready(function () {
    // Listen for change events on select elements with class "status-select"
    $('.status-select').on('change', function () {
        // Get the selected value
        var selectedValue = $(this).val();
        // alert(selectedValue)
        // Get the data-item-id attribute to identify the item
        var itemId = $(this).data('item-id');

        // Send an AJAX request to the server
        $.ajax({
            url: 'order_update_status', // Replace with your server endpoint
            type: 'POST',
            data: {
                itemId: itemId,
                status: selectedValue,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                // Handle the server's response (if needed)
                console.log('Status updated successfully');
            },
            error: function (xhr, status, error) {
                // Handle errors (if any)
                console.error('Error:', error);
            }
        });
    });
});

    </script>
<script>
    $(document).ready( function () {
    $('#orders').DataTable();
} );
</script>
