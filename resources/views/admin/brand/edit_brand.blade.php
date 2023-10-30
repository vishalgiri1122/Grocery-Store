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
                                    <div class="card-header">Edit brand</div>
                                    <div class="card-body">
                                        <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name</label>
                                                <input id="name" name="name" type="text" class="form-control" value="{{ $brand->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="image" class="control-label mb-1 d-block">Category</label>
                                                <select name="category_id" id="category_id">
                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->category_name  }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="image" class="control-label mb-1">Image</label>
                                                <input id="image" name="image" type="file" class="form-control">
                                                @error('image')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="control-label mb-1">Status</label>
                                                <div>
                                                    <label class="switch switch-text switch-success">
                                                        <input type="checkbox" class="switch-input" name="status" @php
                                                            if($brand->status == 'Active'){
                                                                echo "checked";
                                                            }
                                                        @endphp>
                                                        <span data-on="On" data-off="Off" class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button class="btn btn-success">Update brand</button>
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
