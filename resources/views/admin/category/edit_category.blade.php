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
                                    <div class="card-header">Edit Category</div>
                                    <div class="card-body">
                                        <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="category_name" class="control-label mb-1">Category Name</label>
                                                <input id="category_name" name="category_name" type="text" class="form-control" value="{{ $category->category_name }}">
                                                @error('category_name')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                                <input id="category_slug" name="category_slug" type="text" class="form-control" value="{{ $category->category_slug }}">
                                                @error('category_slug')
                                                <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="image" class="control-label mb-1">Image</label>
                                                <input id="image" name="image" type="file" class="form-control" value="{{ $category->image }}">
                                                @error('image')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="control-label mb-1">Status</label>
                                                <div>
                                                    <label class="switch switch-text switch-success">
                                                        <input type="checkbox" class="switch-input" @php
                                                            if($category->status == 'Active') {echo "checked";}
                                                        @endphp name="status">
                                                        <span data-on="On" data-off="Off" class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                    @error('status')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button class="btn btn-success">Update Category</button>
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
