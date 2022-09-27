@extends('layouts.app')

@section('style')
 <style>
    body {
        padding: 0px;
        margin: 0px;
        background-image: url(/img/bg/la.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
    }
</style>
@endsection

@section('content')

<section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          {{-- <div class="login-brand mb-4"> --}}
            {{-- <img src="{{asset('/img/aff.png')}}" alt="logo" width="250px"> --}}
          {{-- </div> --}}
          
          <div class="card card-info mt-5"><br>
            <center>
              <img class="mb-5" src="{{asset('/img/aff.png')}}" alt="logo" width="250px">
            </center>

            {{-- <h5 class="text-center mb-3">Login</h5> --}}

            <div class="card-body">
              <form method="POST" action="{{ route('login') }}" novalidate="">
                @csrf

                <div class="form-group">
                  <label for="username">Username</label>
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" tabindex="1" value="{{ old('username') }}" required autocomplete="username" autofocus>
                  
                  @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                  </div>
                  <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" tabindex="2" value="{{ old('password') }}" required autocomplete="password">
                  
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>


                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group mt-2">
                  <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
                    {{ __('Login') }}
                </button>
                </div>
              </form>

                {{-- @if (Route::has('password.request'))
                    <a class="btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif --}}
                <div class="text-center mb-2">
                    Register Mahasiswa ?
                    <a class="btn-link" href="{{ route('register') }}"> click here</a>
                </div>
                <div class="simple-footer mb-0 mt-2">
                  Copyright &copy; arisafriyanto 2020
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
