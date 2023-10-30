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
                                    <div class="card-header">Edit Product</div>
                                    <div class="card-body">
                                        <form action="{{ url($url) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">product Name</label>
                                                <input id="name" name="name" type="text" class="form-control" value="{{ $product->name }}">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="slug" class="control-label mb-1">Categroy</label>
                                            <select name="category_id" class="form-control">
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}"> {{ $cat->category_name }} </option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="slug" class="control-label mb-1">product Slug</label>
                                                <input id="slug" name="slug" type="text" class="form-control" value="{{ $product->slug }}">
                                                @error('slug')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="image" class="control-label mb-1">Image</label>
                                                <input id="image" name="image" type="file" class="form-control" value="{{ $product->image }}">
                                                @error('image')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="brand" class="control-label mb-1">Brand</label>
                                                <input id="brand" name="brand" type="text" class="form-control" value="{{ $product->brand }}">
                                                @error('brand')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="model" class="control-label mb-1">Model</label>
                                                <input id="model" name="model" type="text" class="form-control" value="{{ $product->model }}">
                                                @error('model')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="short_desc" class="control-label mb-1">Short description</label>
                                                <input id="short_desc" name="short_desc" type="text" class="form-control" value="{{ $product->short_desc }}">
                                                @error('short_desc')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="desc" class="control-label mb-1">Description</label>
                                                <input id="desc" name="desc" type="text" class="form-control" value="{{ $product->desc }}">
                                                @error('desc')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="keywords" class="control-label mb-1">keywords</label>
                                                <input id="keywords" name="keywords" type="text" class="form-control" value="{{ $product->keywords }}">
                                                @error('keywords')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="technical_specifications" class="control-label mb-1">Technical specifications</label>
                                                <input id="technical_specifications" name="technical_specifications" type="text" class="form-control" value="{{ $product->technical_specifications }}">
                                                @error('technical_specifications')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="uses" class="control-label mb-1">Uses</label>
                                                <input id="uses" name="uses" type="text" class="form-control" value="{{ $product->uses }}">
                                                @error('uses')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="warranty" class="control-label mb-1">Warranty</label>
                                                <input id="warranty" name="warranty" type="text" class="form-control" value="{{ $product->warranty }}">
                                                @error('warranty')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="slug" class="control-label mb-1">Status</label>
                                                <div>
                                                    <label class="switch switch-text switch-success">
                                                        <input type="checkbox" class="switch-input" name="status" @php
                                                        if($product->status == 'Active'){
                                                            echo "checked";
                                                        }
                                                        @endphp  >
                                                        <span data-on="On" data-off="Off" class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button class="btn btn-success">Edit product</button>
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
