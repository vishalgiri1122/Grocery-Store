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
                                    <h2 class="strong"> Colors </h2>
                                    <a href="{{ url('add_color') }}">
                                        <button class="btn btn-success">Add color</button>
                                    </a>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Color</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($colors as $color)
                                            {{-- @if($color->status == 'Active') --}}
                                            <tr>
                                                <td>{{$color->id}}</td>
                                                <td>{{$color->color}}</td>
                                                <td>
                                                    <a href="{{ route('edit_color',['id'=>$color->id]) }}">
                                                        <button class="btn btn-success">Edit color</button>
                                                    </a>
                                                    <a href="{{ route('delete_color',['id'=>$color->id]) }}">
                                                        <button class="btn btn-danger">Delete color</button>
                                                    </a>
                                                </td>
                                                <td>{{$color->status}}</td>
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
