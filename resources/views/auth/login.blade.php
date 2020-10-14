@extends('layouts.app')

@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href="/"><b>My</b>BLOG</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="form-group has-feedback">
          <input type="email"
                 class="form-control @error('email') is-invalid @enderror"
                 name="email"
                 placeholder="{{ __('E-Mail Address') }}"
                 value="{{ old('email') }}"
                 autofocus
          >
          <span class="fa fa-envelope form-control-feedback"></span>
          @error('email')
          <span class="invalid-feedback" role="alert">
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
          </span>
          @enderror
        </div>

        <div class="form-group has-feedback">
          <input type="password"
                 class="form-control @error('password') is-invalid @enderror"
                 name="password"
                 placeholder="{{ __('Password') }}">
          <span class="fa fa-lock form-control-feedback"></span>
          @error('password')
          <span class="invalid-feedback" role="alert">
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
          </span>
          @enderror
        </div>

        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"
                       name="remember"
                       {{ old('remember') ? 'checked' : '' }}
                >
                {{ __('Remember Me') }}
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit"
                    class="btn btn-primary btn-block btn-flat">
              {{ __('Login') }}
            </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <br>
      <a href="{{ route('password.request') }}">
        I forgot my password
      </a>
      <br>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
@endsection
