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
                                    <h2 class="strong"> sizes </h2>
                                    <a href="{{ url('add_size') }}">
                                        <button class="btn btn-success">Add size</button>
                                    </a>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>size</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sizes as $size)
                                            {{-- @if($size->status == 'Active') --}}
                                            <tr>
                                                <td>{{$size->id}}</td>
                                                <td>{{$size->size}}</td>
                                                <td>
                                                    <a href="{{ route('edit_size',['id'=>$size->id]) }}">
                                                        <button class="btn btn-success">Edit size</button>
                                                    </a>
                                                    <a href="{{ route('delete_size',['id'=>$size->id]) }}">
                                                        <button class="btn btn-danger">Delete size</button>
                                                    </a>
                                                </td>
                                                <td>{{$size->status}}</td>
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
