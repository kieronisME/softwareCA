@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card register-card">
                <div class="card-header text-center">
                    <h2 class="mb-0">{{ __('Create Your Account') }}</h2>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label">{{ __('Full Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <div class="failedVal">
                                <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <div class="failedVal">
                                <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="new-password">
                            <small class="form-text text-muted">At least 8 characters</small>
                            @error('password')
                            <div class="failedVal">
                                <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" 
                                   name="password_confirmation" required>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-person-plus me-2"></i> {{ __('Register') }}
                            </button>
                        </div>

                        <div class="text-center mb-3">
                            <p class="mb-2">Already have an account?</p>
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">
                                {{ __('Sign In') }}
                            </a>
                        </div>

                        <div class="text-center">
                            @if (Route::has('myRoutes.topDogRoutes.topDogAuth'))
                            <a href="{{ route('myRoutes.topDogRoutes.topDogAuth') }}" class="btn btn-sm btn-outline-secondary me-2">
                                <i class="bi bi-person-gear me-1"></i> {{ __('Admin Access') }}
                            </a>
                            @endif

                            @if (Route::has('myRoutes.topDogRoutes.topDogAuthSupplierView'))
                            <a href="{{ route('myRoutes.topDogRoutes.topDogAuthSupplierView') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-truck me-1"></i> {{ __('Supplier Access') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection