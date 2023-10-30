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
                                    <div class="card-header">Add Product</div>
                                    <div class="card-body">
                                        <form action="{{ url('add_product') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="category_id" class="control-label mb-1">Categroy</label>
                                            <select name="category_id" class="form-control" id="category_id">
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}" data-id="{{ $cat->id }}"> {{ $cat->category_name }} </option>
                                                @endforeach
                                            </select>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="brand_id" class="control-label mb-1">Brand</label>
                                            <select name="brand_id" id="brand_id" class="form-control">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}" data-category_id="{{ $brand->category_id }}" data-brand_id="{{ $brand->id }}" > {{ $brand->name }} </option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="color_id" class="control-label mb-1">Colors</label>
                                            <select name="color_id[]" id="color_id" class="form-control js-example-basic-multiple" multiple="multiple">
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color->id }}"> {{ $color->color }} </option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="size_id" class="control-label mb-1">Sizes</label>
                                            <select name="size_id[]" class="form-control js-example-basic-multiple" multiple="multiple">
                                                @foreach ($sizes as $size)
                                                    <option value="{{ $size->id }}"> {{ $size->size }} </option>
                                                @endforeach
                                            </select>
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Product Name</label>
                                                <input id="name" name="name" type="text" class="form-control">
                                                @error('name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="image" class="control-label mb-1">Thumbnail</label>
                                                <input id="image" name="image" type="file" class="form-control">
                                                @error('image')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="short_desc" class="control-label mb-1">Short description</label>
                                                <input id="short_desc" name="short_desc" type="text" class="form-control">
                                                @error('short_desc')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="desc" class="control-label mb-1">Description</label>
                                                <textarea id="desc" name="desc" type="text" class="form-control"></textarea>
                                                @error('desc')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="price" class="control-label mb-1">Price</label>
                                                <input id="price" name="price" type="text" class="form-control">
                                                @error('price')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="in_stock" class="control-label mb-1">Available quantity (In stock)</label>
                                                <input id="in_stock" name="in_stock" type="text" class="form-control">
                                                @error('in_stock')
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
                                            <button class="btn btn-success">Add product</button>
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






    <script>
    document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("category_id").addEventListener('change', (event) => {
        const selectedOption = event.target.options[event.target.selectedIndex];
        const dataId = selectedOption.getAttribute("data-id");
        console.log("dataId",dataId);

        let allBrandOptions = document.getElementById("brand_id").options;
        console.log("allBrandOptions",allBrandOptions);
        for(var i = 0; i<allBrandOptions.length; i++){
            if(allBrandOptions[i].dataset.category_id != dataId){
                allBrandOptions[i].style.display = "none";
            }
            else{
                allBrandOptions[i].style.display = "block";
                allBrandOptions[i].selected = true;
            }
        }
    });
});





    </script>
