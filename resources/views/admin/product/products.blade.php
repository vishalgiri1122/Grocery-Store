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
                                    <h2 class="strong"> Products </h2>
                                    <a href="{{ url('add_product') }}">
                                        <button class="btn btn-success">Add product</button>
                                    </a>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" id="products">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $prod)
                                            <tr>
                                                <td>{{$prod->id}}</td>
                                                <td>{{$prod->name}}</td>
                                                <td>{{$prod->category->category_name}}</td>
                                                <td> <img src="{{ asset('assets/admin/product_images/' . $prod->image ) }}" alt="image" style="max-width:100px"> </td>
                                                <td>{{$prod->price}}</td>
                                                <td>{{$prod->status}}</td>
                                                <td>
                                                    <a href="{{ route('edit_product',['id'=>$prod->id]) }}">
                                                        <button class="btn btn-success">Edit product</button>
                                                    </a>
                                                    <a href="{{ route('delete_product',['id'=>$prod->id]) }}">
                                                        <button class="btn btn-danger">Delete product</button>
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
    $(document).ready( function () {
    $('#products').DataTable();
} );
</script>
