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
                                    <h2 class="strong"> Products Attributes </h2>
                                    <a href="{{ url('add_product_attr') }}">
                                        <button class="btn btn-success">Add product attribute</button>
                                    </a>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Product</th>
                                                <th>sku</th>
                                                <th>Image</th>
                                                <th>mrp</th>
                                                <th>price</th>
                                                <th>qty</th>
                                                <th>size</th>
                                                <th>color</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $prod)
                                            <tr>
                                                <td>{{$prod->id}}</td>
                                                <td>{{$prod->product_id}}</td>
                                                <td>{{$prod->sku}}</td>
                                                <td> <img src="{{ asset('product_attr_images/' . $prod->image ) }}" alt="image" > </td>
                                                <td>{{$prod->mrp}}</td>
                                                <td>{{$prod->price}}</td>
                                                <td>{{$prod->qty}}</td>
                                                <td>{{$prod->size}}</td>
                                                <td>{{$prod->color}}</td>
                                                <td>{{$prod->status}}</td>
                                                <td>
                                                    <a href="{{ route('edit_product_attr',['id'=>$prod->id]) }}">
                                                        <button class="btn btn-success">Edit Product Attribute</button>
                                                    </a>
                                                    <a href="{{ route('delete_product_attr',['id'=>$prod->id]) }}">
                                                        <button class="btn btn-danger">Delete Product Attribute</button>
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
