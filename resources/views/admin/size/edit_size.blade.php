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
                                    <div class="card-header">Edit size</div>
                                    <div class="card-body">
                                        <form action="{{ $url }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="size" class="control-label mb-1">size</label>
                                                <input id="size" name="size" type="text" class="form-control" value="{{ $size->size }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="control-label mb-1">Status</label>
                                                <div>
                                                    <label class="switch switch-text switch-success">
                                                        <input type="checkbox" class="switch-input" name="status" @php
                                                            if($size->status == 'Active'){
                                                                echo "checked";
                                                            }
                                                        @endphp>
                                                        <span data-on="On" data-off="Off" class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button class="btn btn-success">Update size</button>
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
