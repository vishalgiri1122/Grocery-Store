@include('admin.layout.head')

<body>
    <script>
        @if(Session::has('success'))
       toastr.options = {
       "closeButton": true,
       "progressBar": true
   }
       toastr.success("{{ (session('success')) }}")
   @endif
        @if(Session::has('error'))
       toastr.options = {
       "closeButton": true,
       "progressBar": true
   }
       toastr.error("{{ (session('error')) }}")
   @endif
      </script>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            {{-- <h1> {{ Config::get('constants.my_site') }} </h1> --}}
                            <a href="#">
                                <img src="{{ asset('assets/admin/images/icon/logo.png') }}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ url('admin') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox d-flex justify-content-end">
                                    {{-- <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label> --}}
                                    <label>
                                        <a href="{{ url('forget-password') }}">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                {{-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div> --}}
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="{{ url('register') }}">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.layout.footer')
