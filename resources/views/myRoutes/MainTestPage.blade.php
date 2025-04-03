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
        <h1 class="mb-4">Welcome</h1>


        @if((auth()->guard('admin')->check()) || (auth()->guard('supplier')->check()))
            <div class="alert alert-success mb-4">
                <strong>YOU ARE VERIFIED</strong>
            </div>
        @endif




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
</body>

</html>