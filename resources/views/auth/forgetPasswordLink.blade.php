@extends('layout')



@section('content')

<style>
    main{
      height: 100vh;
      display: grid;
      align-items: center;
    }
    .card{
        background-color: #fff;
    }
    .resetBtn{
        color: #fff;
  background-color: #26B99E;
  border-color: #26B99E;
    }
    .card-header {
  padding: .75rem 1.25rem;
  margin-bottom: 0;
  background-color: #26B99E;
  border-bottom: #26B99E;
  color: #fff;
  font-size: 20px;
  text-align: center;
}
</style>

<main class="login-form">

  <div class="cotainer">

      <div class="row justify-content-center">

          <div class="col-md-6">

              <div class="card">

                  <div class="card-header">Reset Password</div>

                  <div class="card-body">



                      <form action="{{ route('reset.password.post') }}" method="POST">

                          @csrf

                          <input type="hidden" name="token" value="{{ $token }}">



                          <div class="form-group row">

                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                              <div class="col-md-6">

                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>

                                  @if ($errors->has('email'))

                                      <span class="text-danger">{{ $errors->first('email') }}</span>

                                  @endif

                              </div>

                          </div>



                          <div class="form-group row">

                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                              <div class="col-md-6">

                                  <input type="password" id="password" class="form-control" name="password" required autofocus>

                                  @if ($errors->has('password'))

                                      <span class="text-danger">{{ $errors->first('password') }}</span>

                                  @endif

                              </div>

                          </div>



                          <div class="form-group row">

                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                              <div class="col-md-6">

                                  <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>

                                  @if ($errors->has('password_confirmation'))

                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>

                                  @endif

                              </div>

                          </div>



                          <div class="col-md-6 offset-md-4">

                              <button type="submit" class="btn resetBtn">

                                  Reset Password

                              </button>

                          </div>

                      </form>



                  </div>

              </div>

          </div>

      </div>

  </div>

</main>

@endsection
