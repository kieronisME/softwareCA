<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/external-css/main.css') }}">
    <style>
        .login-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
        }
        .top-navigation {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .navBtn {
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .login-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <div class="login-container">
        <div class="top-navigation">
            <a href="/" class="navBtn btn btn-outline-primary">
                <i class="bi bi-house-door"></i> Back to Welcome
            </a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="navBtn btn btn-outline-secondary">
                <i class="bi bi-person-plus"></i> Register
            </a>
            @endif
        </div>

        <div class="card login-card">


            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="current-password">
                        @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-box-arrow-in-right"></i> {{ __('Log In') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <div class="text-center mt-4">
            @if (Route::has('myRoutes.topDogRoutes.topDogAuth'))
            <a class="btn btn-sm btn-outline-dark me-2" href="{{ route('myRoutes.topDogRoutes.topDogAuth') }}">
                <i class="bi bi-person-gear"></i> {{ __('Admin Login') }}
            </a>
            @endif

            @if (Route::has('myRoutes.topDogRoutes.topDogAuthSupplierView'))
            <a class="btn btn-sm btn-outline-dark" href="{{ route('myRoutes.topDogRoutes.topDogAuthSupplierView') }}">
                <i class="bi bi-truck"></i> {{ __('Supplier Login') }}
            </a>
            @endif
        </div>
    </div>
</div>
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>