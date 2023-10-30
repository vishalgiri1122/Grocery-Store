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
                                    <div class="card-header">Add coupon</div>
                                    <div class="card-body">
                                        <form action="{{ url('add_coupon') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="title" class="control-label mb-1">Title</label>
                                                <input id="title" name="title" type="text" class="form-control">
                                                @error('title')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="code" class="control-label mb-1">Code</label>
                                                <input id="code" name="code" type="text" class="form-control">
                                                @error('code')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="value" class="control-label mb-1">Value</label>
                                                <input id="value" name="value" type="text" class="form-control">
                                                @error('value')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="control-label mb-1">Status</label>
                                                <div>
                                                    <label class="switch switch-text switch-success">
                                                        <input type="checkbox" class="switch-input" checked="true" name="status">
                                                        <span data-on="On" data-off="Off" class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button class="btn btn-success">Add coupon</button>
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
