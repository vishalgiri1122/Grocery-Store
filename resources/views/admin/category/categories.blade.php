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
                            <div class="col-lg-9">
                                <div class="mt-4 mb-4">
                                    <h2 class="strong"> Categories </h2>
                                    <a href="{{ url('add_category') }}">
                                        <button class="btn btn-success">Add Category</button>
                                    </a>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" id="categories">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Category Name</th>
                                                <th>Category Thumbnail</th>
                                                <th>Action</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $cat)
                                            {{-- @if($cat->status == 'Active') --}}
                                            <tr>
                                                <td>{{$cat->id}}</td>
                                                <td>{{$cat->category_name}}</td>
                                                <td> <img src="{{ asset('assets/admin/category_images/' . $cat->image ) }}" alt="image" style="max-width:100px"> </td>

                                                <td>
                                                    <a href="{{ route('edit_category',['id'=>$cat->id]) }}">
                                                        <button class="btn btn-success">Edit Category</button>
                                                    </a>
                                                    <a href="{{ route('delete_category',['id'=>$cat->id]) }}">
                                                        <button class="btn btn-danger">Delete Category</button>
                                                    </a>
                                                </td>
                                                <td>{{$cat->status}}</td>
                                            </tr>
                                            {{-- @endif --}}
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
        $('#categories').DataTable();
    } );
    </script>
