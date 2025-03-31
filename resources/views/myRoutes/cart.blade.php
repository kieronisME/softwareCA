<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Your Shopping Cart</h1>



        <!-- Wood -->


        @if($woodProducts->isNotEmpty())
        <!-- <h2>Wood Products</h2> -->
        <ul class="list-unstyled">
            @foreach ($woodProducts as $product)
            <li class="mb-4 p-3 border rounded">
                <strong>{{ $product->Product_name }}</strong><br>
                Price: ${{ number_format($product->Price, 2) }}<br>
                Quantity in Cart: {{ $product->pivot->quantity }}<br>

                <form action="{{ route('cart.update', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <input type="number" name="quantity" value="{{ $product->pivot->quantity }}"
                        min="1" max="{{ $product->quantity }}" class="form-control d-inline-block" style="width: 80px;">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <form action="{{ route('cart.remove', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </li>
            @endforeach
        </ul>
        @endif



        <!-- Metal -->


        @if($metalProducts->isNotEmpty())
        <!-- <h2>Metal Products</h2> -->
        <ul class="list-unstyled">
            @foreach ($metalProducts as $product)
            <li class="mb-4 p-3 border rounded">
                <strong>{{ $product->Product_name }}</strong><br>
                Price: ${{ number_format($product->Price, 2) }}<br>
                Quantity in Cart: {{ $product->pivot->quantity }}<br>

                <form action="{{ route('cart.update', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <input type="number" name="quantity" value="{{ $product->pivot->quantity }}"
                        min="1" max="{{ $product->quantity }}" class="form-control d-inline-block" style="width: 80px;">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <form action="{{ route('cart.remove', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </li>
            @endforeach
        </ul>
        @endif



        <!-- Steel -->



        @if($steelProducts->isNotEmpty())
        <!-- <h2>Steel Products</h2> -->
        <ul class="list-unstyled">
            @foreach ($steelProducts as $product)
            <li class="mb-4 p-3 border rounded">
                <strong>{{ $product->Product_name }}</strong><br>
                Price: ${{ number_format($product->Price, 2) }}<br>
                Quantity in Cart: {{ $product->pivot->quantity }}<br>

                <form action="{{ route('cart.update', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <input type="number" name="quantity" value="{{ $product->pivot->quantity }}"
                        min="1" max="{{ $product->quantity }}" class="form-control d-inline-block" style="width: 80px;">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <form action="{{ route('cart.remove', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </li>
            @endforeach
        </ul>
        @endif




        <form action="{{ route('cart.buy', $product) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">buy some shi</button>
        </form>


    </div>
</body>

</html>