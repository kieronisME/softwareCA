@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Dashboard') }}</span>
                    
                    {{-- User Type Indicator --}}
                    @auth
                    <div>
                        <span class="badge 
                            @if(auth()->guard('admin')->check()) bg-danger
                            @elseif(auth()->guard('supplier')->check()) bg-warning text-dark
                            @else bg-primary
                            @endif">
                            @if(auth()->guard('admin')->check()) ADMIN
                            @elseif(auth()->guard('supplier')->check()) SUPPLIER
                            @else USER
                            @endif
                        </span>
                        <span class="ms-2 fw-bold">{{ Auth::user()->user_name ?? Auth::user()->name }}</span>
                    </div>
                    @endauth
                </div>

                <div class="card-body">
                    <div class="mb-4">
                        {{ __("You're logged in!") }}
                    </div>

                    @if((auth()->guard('admin')->check()) || (auth()->guard('supplier')->check()))
                    <div class="alert alert-success mb-4">
                        <strong>YOU ARE VERIFIED</strong>
                    </div>
                    @endif

                    <div class="d-grid gap-3 mb-4">
                        <!-- Logout Button -->
                        <a class="btn btn-outline-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Log Out') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        <!-- CART -->
                        @if (Route::has('myRoutes.cart'))
                        <x-secondary-button>
                            <a href="{{ route('myRoutes.cart') }}" class="text-decoration-none text-dark">Carts</a>
                        </x-secondary-button>
                        @endif

                        <!-- API -->
                        @if (Route::has('myRoutes.work'))
                        <x-secondary-button class="btn-warning">
                            <a href="{{ route('myRoutes.work') }}" class="text-decoration-none text-dark">Carbon Footprint API</a>
                        </x-secondary-button>
                        @endif

                        <!-- USER DASHBOARDS -->
                        @if (Route::has('myRoutes.adminUserView'))
                        <x-secondary-button class="btn-success">
                            <a href="{{ route('myRoutes.adminUserView') }}" class="text-decoration-none text-dark">Admin Dashboard</a>
                        </x-secondary-button>
                        @endif

                        <!-- CERT -->
                        @if (Route::has('myRoutes.certProd.wood'))
                        <x-secondary-button>
                            <a href="{{ route('myRoutes.certProd.wood') }}" class="text-decoration-none text-dark">Show Wood</a>
                        </x-secondary-button>
                        @endif

                        @if (Route::has('myRoutes.certProd.metal'))
                        <x-secondary-button>
                            <a href="{{ route('myRoutes.certProd.metal') }}" class="text-decoration-none text-dark">Show Metal</a>
                        </x-secondary-button>
                        @endif

                        @if (Route::has('myRoutes.certProd.steel'))
                        <x-secondary-button>
                            <a href="{{ route('myRoutes.certProd.steel') }}" class="text-decoration-none text-dark">Show Steel</a>
                        </x-secondary-button>
                        @endif

                        <!-- NOT CERT -->
                        @if (Route::has('myRoutes.certProd.Nwood'))
                        <x-secondary-button>
                            <a href="{{ route('myRoutes.certProd.Nwood') }}" class="text-decoration-none text-dark">NOT Wood</a>
                        </x-secondary-button>
                        @endif

                        @if (Route::has('myRoutes.certProd.Nmetal'))
                        <x-secondary-button>
                            <a href="{{ route('myRoutes.certProd.Nmetal') }}" class="text-decoration-none text-dark">NOT Metal</a>
                        </x-secondary-button>
                        @endif

                        @if (Route::has('myRoutes.certProd.Nsteel'))
                        <x-secondary-button>
                            <a href="{{ route('myRoutes.certProd.Nsteel') }}" class="text-decoration-none text-dark">NOT Steel</a>
                        </x-secondary-button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection