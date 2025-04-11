<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="text-center">
        <h1 class="mb-4">Welcome to Sutain</h1>


        <div>
            {{-- User Type Indicator --}}
            <div>
                @auth
                <span class="badge 
                                @if(auth()->guard('admin')->check()) bg-danger
                                @elseif(auth()->guard('supplier')->check()) bg-warning text-dark
                                @else bg-primary
                                @endif p-2 mb-5">
                    @if(auth()->guard('admin')->check()) ADMIN
                    @elseif(auth()->guard('supplier')->check()) SUPPLIER
                    @else USER
                    @endif
                </span>
                <span class="ms-2">{{ Auth::user()->user_name ?? Auth::user()->name }}</span>
                @endauth
            </div>
        </div>

        @if(auth()->guard('supplier')->check())
        <div class="alert alert-success mb-4">
            <strong>SUPPLIER STATUS</strong>
        </div>
        @elseif(auth()->guard('admin')->check())
        <div class="alert alert-success mb-4">
            <strong>ADMIN STATUS</strong>
        </div>
        @endif



        <a class="btn btn-outline-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();  
        document.getElementById('logout-form').submit();">
            {{ __('Log Out') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>




        <!-- CART -->

        <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Our Products</h2>
        @if (Route::has('myRoutes.cart'))
        <a href="{{ route('myRoutes.cart') }}" class="btn btn-primary position-relative">
            <i class="bi bi-cart3"></i> View Cart


        </a>
        @endif
    </div>


        <!-- CERT -->

        <div class="container">

    <h2 class="my-4 text-center">Certified Products</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Wood -->
        <div class="col">
            <div class="card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Wood Products</h5>
                            <p class="card-text"><small class="text-success">Certified</small></p>
                            <p class="card-text">Premium sustainably sourced hardwood with FSC certification.</p>
                            @if (Route::has('myRoutes.certProd.wood'))
                            <div class="mt-3">
                                <a href="{{ route('myRoutes.certProd.wood') }}" class="btn btn-outline-success">
                                    <i class="bi bi-eye"></i> View Wood
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/tree.png" class="img-fluid rounded-start h-100" alt="Wood Products" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Metal -->
        <div class="col">
            <div class="card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Metal Products</h5>
                            <p class="card-text"><small class="text-success">Certified</small></p>
                            <p class="card-text">High-grade metal stock with ISO 9001 certification.</p>
                            @if (Route::has('myRoutes.certProd.metal'))
                            <div class="mt-3">
                                <a href="{{ route('myRoutes.certProd.metal') }}" class="btn btn-outline-success">
                                    <i class="bi bi-eye"></i> View Metal
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/metal.png" class="img-fluid rounded-start h-100" alt="Metal Products" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Steel -->
        <div class="col">
            <div class="card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Steel Products</h5>
                            <p class="card-text"><small class="text-success">Certified</small></p>
                            <p class="card-text">Structural steel components meeting AISC standards.</p>
                            @if (Route::has('myRoutes.certProd.steel'))
                            <div class="mt-3">
                                <a href="{{ route('myRoutes.certProd.steel') }}" class="btn btn-outline-success">
                                    <i class="bi bi-eye"></i> View Steel
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/steel.png" class="img-fluid rounded-start h-100" alt="Steel Products" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h2 class="my-4 text-center">Non-Certified Products</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Wood -->
        <div class="col">
            <div class="card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Wood Products</h5>
                            <p class="card-text"><small class="text-secondary">Not Certified</small></p>
                            <p class="card-text">Standard wood products for general applications.</p>
                            @if (Route::has('myRoutes.certProd.Nwood'))
                            <div class="mt-3">
                                <a href="{{ route('myRoutes.certProd.Nwood') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-eye"></i> View Wood
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/tree.png" class="img-fluid rounded-start h-100" alt="Wood Products" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Metal -->
        <div class="col">
            <div class="card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Metal Products</h5>
                            <p class="card-text"><small class="text-secondary">Not Certified</small></p>
                            <p class="card-text">Standard metal stock for general fabrication.</p>
                            @if (Route::has('myRoutes.certProd.Nmetal'))
                            <div class="mt-3">
                                <a href="{{ route('myRoutes.certProd.Nmetal') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-eye"></i> View Metal
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/metal.png" class="img-fluid rounded-start h-100" alt="Metal Products" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Steel -->
        <div class="col">
            <div class="card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Steel Products</h5>
                            <p class="card-text"><small class="text-secondary">Not Certified</small></p>
                            <p class="card-text">Standard steel products for general construction.</p>
                            @if (Route::has('myRoutes.certProd.Nsteel'))
                            <div class="mt-3">
                                <a href="{{ route('myRoutes.certProd.Nsteel') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-eye"></i> View Steel
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/steel.png" class="img-fluid rounded-start h-100" alt="Steel Products" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .text-success {
        color: #28a745 !important;
    }
</style>

</body>

</html>