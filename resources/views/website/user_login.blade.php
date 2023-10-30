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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Customer - login</h1>
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
                    <form action="{{ url('userLogin') }}" method="post">
                        @csrf
                        <input type="hidden" name="previousURL" value="{{ url()->previous() }}">
                        <div class="control-group mb-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" />
                        </div>
                        <div class="control-group mb-4">
                            <input type="password" class="form-control mb-2" id="password" name="password" placeholder="Password"
                               />
                               @error('error')
                                    <span class="text-danger"> {{ $message }} </span>
                               @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit"> LOGIN </button>
                        </div>
                    </form>
                    <div class="register-link mt-4">
                        <p>
                            <a href="{{ url('/forget-password') }}">Forgotten password?</a>
                        </p>
                        <p>
                            Don't you have account?
                            <a href="{{ url('user/register') }}">Sign Up Here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@include('website.layout.footer')
