@include('admin.layout.head')
@include('admin.layout.header_sidebar')
<style>
    textarea{
        height: 300px;
    }
</style>
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
                                                <label for="slug" class="control-label mb-1">Categroy</label>
                                            <select name="category_id" class="form-control">
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}" @if($cat->id == $product->category_id)
                                                        selected
                                                    @endif>
                                                    {{ $cat->category_name }} </option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Product Name</label>
                                                <input id="name" name="name" type="text" class="form-control" value="{{ $product->name }}">
                                                @error('name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="image" class="control-label mb-1">Image</label>
                                                <input id="image" name="image" type="file" class="form-control" value="{{ $product->image }}">
                                                @error('image')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="short_desc" class="control-label mb-1">Short description</label>
                                                <input id="short_desc" name="short_desc" type="text" class="form-control" value="{{ $product->short_desc }}">
                                                @error('short_desc')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="desc" class="control-label mb-1">Description</label>
                                                <textarea id="desc" name="desc" class="form-control">{{ $product->desc }}</textarea>
                                                @error('desc')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="price" class="control-label mb-1">Price</label>
                                                <input id="price" name="price" type="text" class="form-control" value="{{ $product->price }}">
                                                @error('price')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="in_stock" class="control-label mb-1">Quantity</label>
                                                <input id="in_stock" name="in_stock" type="text" class="form-control" value="{{ $product->in_stock }}">
                                                @error('in_stock')
                                                <span class="text-danger"> {{ $message }} </span>
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
