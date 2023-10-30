@include('website.layout.head')
   <script>
     @if(Session::has('success'))
	toastr.options = {
	"closeButton": true,
	"progressBar": true
}
	toastr.success("{{ (session('success')) }}")
@endif
   </script>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Customer - Registration</h1>
            <div class="d-inline-flex">
                <a href="{{ url('/') }}"> 
                <p class="m-0"><button class="btn btn-primary py-2 px-4" type="submit"> Back to Home </button></p>
                </a>
                <!--<p class="m-0 px-2">-</p>-->
                <!--<p class="m-0">Contact</p>-->
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-6 mx-auto mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form id="" action="{{ url('saveUser') }}" method="post" >
                        @csrf
                        <div class="control-group mb-4">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}"/>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="control-group mb-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}"
                                />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="control-group mb-4">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}"
                                />
                                 @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="control-group mb-4">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" value="{{ old('confirm_password') }}"
                                />
                                @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton"> Register </button>
                        </div>
                    </form>
                    <div class="register-link mt-4">
                        <p>
                            Already have account?
                            <a href="{{ url('user/login') }}">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@include('website.layout.footer')
