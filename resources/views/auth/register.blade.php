@extends('layouts.app')

@section('content')
        <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
            <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
                <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                    <h1 class="mb-0 fs-3">{{ __('Sign Up')}}</h1>
                    <div class="fs-exact-14 text-muted mt-2 pt-1 mb-5 pb-2">Fill out the form to create a new account.</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="mb-4">
                        <label class="form-label" for="name">{{ __('Full name')}}</label>
                        <input id="name" type="text" class="form-control-lg form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg" name="email" value="{{ old('email') }}" required autocomplete="email" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control-lg form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control-lg form-control" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <div class="mb-4 py-2">
                        <label class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" />
                            <span class="form-check-label">
                                I agree to the
                                <a href="page-terms.html">terms and conditions</a>
                                .
                            </span>
                        </label>
                    </div>
                    <div><button type="submit" class="btn btn-primary btn-lg w-100"> {{ __('Sign Up')}}</button></div>
                    </form>
                </div>
                <div class="sa-divider sa-divider--has-text"><div class="sa-divider__text">Or continue with</div></div>
                <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                    <div class="d-flex flex-wrap me-n3 mt-n3">
                        <button type="button" class="btn btn-secondary flex-grow-1 me-3 mt-3">Google</button>
                        <button type="button" class="btn btn-secondary flex-grow-1 me-3 mt-3">Facebook</button>
                        <button type="button" class="btn btn-secondary flex-grow-1 me-3 mt-3">Twitter</button>
                    </div>
                    <div class="form-group mb-0 mt-4 pt-2 text-center text-muted">
                        Already have an account?
                        <a href="{{ route('login') }}">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
