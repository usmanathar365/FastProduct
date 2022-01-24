@extends('layouts.app')

@section('content')
        <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
            <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
                <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                    <h1 class="mb-0 fs-3">{{ __('Forgot password?') }}</h1>
                    <div class="fs-exact-14 text-muted mt-2 pt-1 mb-5 pb-2">
                        Enter the email address associated with your account and we will send a link to reset your password.
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                    <div class="mb-4">
                        <label  for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control-lg form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                    <div><button type="submit" class="btn btn-primary btn-lg w-100">{{ __('Reset Password') }}</button></div>
                      </form>
                      <div class="form-group mb-0 mt-4 pt-2 text-center text-muted">
                        Remember your password?
                        <a href="{{ route('login') }}">{{ __('Sign in') }}</a>
                    </div>
                </div>
            </div>
        </div>
 
@endsection
