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
                                    <div class="card-header">Add Banner Images</div>
                                    <div class="card-body">
                                        <form action="{{ url('add_banner') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="img" class="control-label mb-1">Select Images</label>
                                                <input id="img" name="img[]" type="file" class="form-control" multiple>
                                                @error('img')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="slug" class="control-label mb-1">Status</label>
                                                <div>
                                                    <label class="switch switch-text switch-success">
                                                        <input type="checkbox" class="switch-input" checked="true" name="status">
                                                        <span data-on="On" data-off="Off" class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button class="btn btn-success">Add Banner</button>
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





