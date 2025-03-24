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





        <!-- API -->
        @if (Route::has('myRoutes.work'))
        <a href="{{ route('myRoutes.work') }}" class="btn btn-warning me-2 px-4 py-3">Carbon footprint api</a>
        @endif



        <!-- USER VIEWS -->
        @if (Route::has('myRoutes.adminUserView'))
        <a href="{{ route('myRoutes.adminUserView') }}" class="btn btn-success me-2 px-4 py-3">admin dashboard</a>
        @endif

        @if (Route::has('myRoutes.supplierUserView'))
        <a href="{{ route('myRoutes.supplierUserView') }}" class="btn btn-success me-2 px-4 py-3">supplier dashboard</a>

        @endif




        <!-- certifeid section -->


        @if (Route::has('myRoutes.certProd.wood'))
        <a href="{{ route('myRoutes.certProd.wood') }}" class="btn btn-primary me-2 px-4 py-3">Show Wood</a>
        @endif

        @if (Route::has('myRoutes.certProd.metal'))
        <a href="{{ route('myRoutes.certProd.metal') }}" class="btn btn-primary me-2 px-4 py-3">show metal</a>
        @endif

        @if (Route::has('myRoutes.certProd.steel'))
        <a href="{{ route('myRoutes.certProd.steel') }}" class="btn btn-primary me-2 px-4 py-3">show steel</a>
        @endif




        <!-- not certifeid section -->
        @if (Route::has('myRoutes.certProd.wood'))
        <a href="{{ route('myRoutes.certProd.Nwood') }}" class="btn btn-danger me-2 px-4 py-3">show not cert wood</a>
        @endif
        @if (Route::has('myRoutes.certProd.metal'))
        <a href="{{ route('myRoutes.certProd.Nmetal') }}" class="btn btn-danger me-2 px-4 py-3">show not cert metal</a>
        @endif
        @if (Route::has('myRoutes.certProd.steel'))
        <a href="{{ route('myRoutes.certProd.Nsteel') }}" class="btn btn-danger me-2 px-4 py-3">show not cert steel</a>
        @endif




    </div>


</body>

</html>