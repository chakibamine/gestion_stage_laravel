@extends('layouts.app')

@section('content')
<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="card border-light-subtle shadow-sm">
      <div class="row g-0">
        <div class="col-12 col-md-6">
          <img class="img-fluid rounded-start w-100 h-100 " loading="lazy"  src="{{ asset('images/logo2.jpg') }}" alt=" Logo">
        </div>
        <div class="col-12 col-md-6">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h2  style="color: rgba(6, 131, 233, 0.785);font-size: 50px" class="text-center">sign up </h2>
                </div>
              </div>
            </div>
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class=" mb-4">
                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="mb-3">
                <label for="password" class=" col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class=" mb-4">
                <div class=" ">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>
              </div>

              <div class="">
                <div class="">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>

                  @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                  </a>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
