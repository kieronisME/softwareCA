<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Metal Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Certified Metal Products</h1>

        <a href="{{ route('myRoutes.CertifiedMetalCRUD.create') }}" class="btn btn-primary me-2">
            Add a product
        </a>

        <ul class="list-unstyled">
            @foreach ($metalPorducts as $certifiedMetalProducts)
            <li class="mb-4 p-3 border rounded">
                <strong>{{ $certifiedMetalProducts->Product_name }}</strong><br>
                Certificate: {{ $certifiedMetalProducts->Certificate }}<br>
                Price: ${{ number_format($certifiedMetalProducts->Price, 2) }}<br>
                Quantity: {{ $certifiedMetalProducts->quantity }}<br>
                CO2: {{ $certifiedMetalProducts->co2 }}<br>
                Weight: {{ $certifiedMetalProducts->weight }} {{ $certifiedMetalProducts->weight_unit }}<br>
                About: {{ $certifiedMetalProducts->About }}

                <div class="mt-2">


                    <form action="{{ route('crud.Metaldestroy', $certifiedMetalProducts) }}" method="POST" class="d-inline" onsubmit="return confirm('This action is permanent!');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <a href="{{ route('crud.Metaledit', $certifiedMetalProducts) }}" class="btn btn-secondary">Edit</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</body>
</html>