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
                                    <div class="card-header">Add Category</div>
                                    <div class="card-body">
                                        <form action="{{ url('add_category') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="category_name" class="control-label mb-1">Category Name</label>
                                                <input id="category_name" name="category_name" type="text" class="form-control">
                                                @error('category_name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                                <input id="category_slug" name="category_slug" type="text" class="form-control">
                                                @error('category_slug')
                                                {{ $message }}
                                                @enderror
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="image" class="control-label mb-1">Thumbnail</label>
                                                <input id="image" name="image" type="file" class="form-control">
                                                @error('image')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="category_slug" class="control-label mb-1">Status</label>
                                                <div>
                                                    <label class="switch switch-text switch-success">
                                                        <input type="checkbox" class="switch-input" checked="true" name="status">
                                                        <span data-on="On" data-off="Off" class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button class="btn btn-success">Add Category</button>
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
