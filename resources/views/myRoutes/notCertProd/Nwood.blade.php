<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Not Wood Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Not Certified Wood Products</h1>

        <a href="{{ route('myRoutes.NotCertifiedWoodCRUD.create') }}" class="btn btn-primary me-2">
            Add a not certified Wood Products
        </a>

        <ul class="list-unstyled">
            @foreach ($notwoodProducts as $notCertWoodproduct)
            <li class="mb-4 p-3 border rounded">
                <strong>{{ $notCertWoodproduct->Product_name }}</strong><br>
                Certificate: {{ $notCertWoodproduct->Certificate }}<br>
                Price: ${{ number_format($notCertWoodproduct->Price, 2) }}<br>
                Quantity: {{ $notCertWoodproduct->quantity }}<br>
                CO2: {{ $notCertWoodproduct->co2 }}<br>
                Weight: {{ $notCertWoodproduct->weight }} {{ $notCertWoodproduct->weight_unit }}<br>
                About: {{ $notCertWoodproduct->About }}

                <div class="mt-2">
                    <!-- Single Add to Cart Form -->
                    <form action="{{ route('cart.add.Nwood', $notCertWoodproduct) }}" method="POST" class="d-inline">
                        @csrf
                        <input type="number" name="quantity" value="1" min="1" max="{{ $notCertWoodproduct->quantity }}" class="form-control d-inline-block" style="width: 80px;">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>

                    <form action="{{ route('pleasDelete', $notCertWoodproduct) }}" method="POST" class="d-inline" onsubmit="return confirm('This action is permanent!');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    

                    <a href="{{ route('crud.NWoodedit', $notCertWoodproduct) }}" class="btn btn-secondary">Edit</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</body>
</html>