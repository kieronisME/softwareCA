<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Not Metal Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Not Certified Metal Products</h1>
        <a
            href="{{ route('MainTestPage') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Home
        </a>

        <a href="{{ route('myRoutes.NotCertifiedMetalCRUD.create') }}" class="btn btn-primary me-2">
            Add a not certified Metal Products
        </a>

        <ul class="list-unstyled">
            @foreach ($notmetalProducts as $notCertfiedMetalProducts)
            <li class="mb-4 p-3 border rounded">
                <strong>{{ $notCertfiedMetalProducts->Product_name }}</strong><br>
                Certificate: {{ $notCertfiedMetalProducts->Certificate }}<br>
                @if($notCertfiedMetalProducts->image)
                    <img src="{{ asset('img/metalimages/' . $notCertfiedMetalProducts->image) }}" alt="{{ $notCertfiedMetalProducts->Product_name }}" style="max-width: 200px; max-height: 200px;" class="img-thumbnail my-2"><br>
                @else
                    <p>No image available</p><br>
                @endif
                Price: ${{ number_format($notCertfiedMetalProducts->Price, 2) }}<br>
                Quantity: {{ $notCertfiedMetalProducts->quantity }}<br>
                CO2: {{ $notCertfiedMetalProducts->co2 }}<br>
                Weight: {{ $notCertfiedMetalProducts->weight }} {{ $notCertfiedMetalProducts->weight_unit }}<br>
                About: {{ $notCertfiedMetalProducts->About }}

                <div class="mt-2">
                    <!-- Single Add to Cart Form -->
                    <form action="{{ route('cart.add.Nmetal', $notCertfiedMetalProducts) }}" method="POST" class="d-inline">
                        @csrf
                        <input type="number" name="quantity" value="1" min="1" max="{{ $notCertfiedMetalProducts->quantity }}" class="form-control d-inline-block" style="width: 80px;">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                    
                    @if((auth()->guard('admin')->check()) || (auth()->guard('supplier')->check()))
                    <form action="{{ route('MetalPleasDelete', $notCertfiedMetalProducts) }}" method="POST" class="d-inline" onsubmit="return confirm('This action is permanent!');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    
                    <a href="{{ route('crud.NMetaledit', $notCertfiedMetalProducts) }}" class="btn btn-secondary">Edit</a>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</body>
</html>