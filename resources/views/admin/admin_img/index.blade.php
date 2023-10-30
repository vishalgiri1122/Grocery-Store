@include('admin.layout.head')
@include('admin.layout.header_sidebar')
<body>
    <div class="page-wrapper">
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update Admin picture</div>
                                    <div class="card-body">
                                        <form action="{{ url('update_admin_pic') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="img" class="control-label mb-1">Admin picture</label>
                                                <input id="img" name="img" type="file" class="form-control" multiple>
                                                @error('img')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <button class="btn btn-success">Update picture</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.layout.footer')





