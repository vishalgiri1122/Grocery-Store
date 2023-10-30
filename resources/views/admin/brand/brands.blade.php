@include('admin.layout.head')
@include('admin.layout.header_sidebar')
<body>
    <script>
        @if(Session::has('category_added'))
       toastr.options = {
       "closeButton": true,
       "progressBar": true
    }
       toastr.success("{{ (session('category_added')) }}")
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
                                    <h2 class="strong"> Brands </h2>
                                    <a href="{{ url('add_brand') }}">
                                        <button class="btn btn-success">Add brand</button>
                                    </a>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{$brand->id}}</td>
                                                <td>{{$brand->name}}</td>
                                                <td>{{$brand->category->category_name}}</td>
                                                <td><img src="{{ asset("brand_images/" . $brand->image) }}" alt="image" height="100" width="100" /></td>
                                                <td>
                                                    <a href="{{ route('edit_brand',['id'=>$brand->id]) }}">
                                                        <button class="btn btn-success">Edit brand</button>
                                                    </a>
                                                    <a href="{{ route('delete_brand',['id'=>$brand->id]) }}">
                                                        <button class="btn btn-danger">Delete brand</button>
                                                    </a>
                                                </td>
                                                <td>{{$brand->status}}</td>
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
