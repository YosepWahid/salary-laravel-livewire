@extends('layouts.guard')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center" style="height: 90vh">
            <div class="col-lg-4 col-md-6 col-sm-8 col-10">
                <h3 class="text-center"><span class="iconify me-2" data-icon="akar-icons:money"></span>Application Salary</h3>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">

                            @error('active')
                                <div class="mb-3 text-center">
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                            @enderror


                            @csrf
                            <div class="mb-3">
                                <label for="email" class="text-md-end">{{ __('Email Address') }}</label>

                                <div class="mt-2">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="mb-3">
                                <label for="password" class="text-md-end">{{ __('Password') }}</label>

                                <div class="mt-2">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <div class="me-2">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>

                            </div>

                            <div class="mb-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
