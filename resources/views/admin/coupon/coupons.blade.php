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
                                    <h2 class="strong"> Coupons </h2>
                                    <a href="{{ url('add_coupon') }}">
                                        <button class="btn btn-success">Add Coupon</button>
                                    </a>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>Code</th>
                                                <th>Value</th>
                                                <th>Action</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($coupons as $coupon)
                                            {{-- @if($coupon->status == 'Active') --}}
                                            <tr>
                                                <td>{{$coupon->id}}</td>
                                                <td>{{$coupon->title}}</td>
                                                <td>{{$coupon->code}}</td>
                                                <td>{{$coupon->value}}</td>
                                                <td>
                                                    <a href="{{ route('edit_coupon',['id'=>$coupon->id]) }}">
                                                        <button class="btn btn-success">Edit Coupon</button>
                                                    </a>
                                                    <a href="{{ route('delete_coupon',['id'=>$coupon->id]) }}">
                                                        <button class="btn btn-danger">Delete Coupon</button>
                                                    </a>
                                                </td>
                                                <td>{{$coupon->status}}</td>
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
