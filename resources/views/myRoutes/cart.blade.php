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

                <form action="{{ route('cart.update.metal', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <input type="number" name="quantity" value="{{ $product->pivot->quantity }}"
                        min="1" max="{{ $product->quantity }}" class="form-control d-inline-block" style="width: 80px;">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <form action="{{ route('cart.remove.metal', $product) }}" method="POST" class="d-inline">
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

                <form action="{{ route('cart.update.steel', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <input type="number" name="quantity" value="{{ $product->pivot->quantity }}"
                        min="1" max="{{ $product->quantity }}" class="form-control d-inline-block" style="width: 80px;">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <form action="{{ route('cart.remove.steel', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </li>
            @endforeach
        </ul>
        @endif






        <!-- NOT CERT -->

        @if($notCertWoodProducts->isNotEmpty())
        <!-- <h2>Wood Products</h2> -->
        <ul class="list-unstyled">
            @foreach ($notCertWoodProducts as $product)
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

                <form action="{{ route('cart.Nremove', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </li>
            @endforeach
        </ul>
        @endif






        @if($notCertMetalProducts->isNotEmpty())
        <ul class="list-unstyled">
            @foreach ($notCertMetalProducts as $notCertMetalproduct)
            <li class="mb-4 p-3 border rounded">
                <strong>{{ $notCertMetalproduct->Product_name }}</strong><br>
                Price: ${{ number_format($notCertMetalproduct->Price, 2) }}<br>
                Quantity in Cart: {{ $notCertMetalproduct->pivot->quantity }}<br>

                <form action="{{ route('cart.NMetalupdate', $notCertMetalproduct) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <input type="number" name="quantity" value="{{ $notCertMetalproduct->pivot->quantity }}"
                        min="1" max="{{ $notCertMetalproduct->quantity }}" class="form-control d-inline-block" style="width: 80px;">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <form action="{{ route('cart.NMetalremove', $notCertMetalproduct) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </li>
            @endforeach
        </ul>
        @endif




        @if($notCertSteelProducts->isNotEmpty())
        <ul class="list-unstyled">
            @foreach ($notCertSteelProducts as $product)
            <li class="mb-4 p-3 border rounded">
                <strong>{{ $product->Product_name }}</strong><br>
                Price: ${{ number_format($product->Price, 2) }}<br>
                Quantity in Cart: {{ $product->pivot->quantity }}<br>

                <form action="{{ route('cart.NSteelupdate', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <input type="number" name="quantity" value="{{ $product->pivot->quantity }}"
                        min="1" max="{{ $product->quantity }}" class="form-control d-inline-block" style="width: 80px;">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <form action="{{ route('cart.NSteelremove', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </li>
            @endforeach
        </ul>
        @endif




        <div class="card mt-4">
            <div class="card-header">
                <h3>Order Summary</h3>
            </div>
            <div class="card-body">
                @if($woodSubtotal > 0)
                <div class="d-flex justify-content-between">
                    <span>Certified Wood:</span>
                    <span>${{ number_format($woodSubtotal, 2) }}</span>
                </div>
                @endif

                @if($metalSubtotal > 0)
                <div class="d-flex justify-content-between">
                    <span>Certified Metal:</span>
                    <span>${{ number_format($metalSubtotal, 2) }}</span>
                </div>
                @endif

                @if($steelSubtotal > 0)
                <div class="d-flex justify-content-between">
                    <span>Certified Steel:</span>
                    <span>${{ number_format($steelSubtotal, 2) }}</span>
                </div>
                @endif

                @if($notCertWoodSubtotal > 0)
                <div class="d-flex justify-content-between">
                    <span>Non-Certified Wood:</span>
                    <span>${{ number_format($notCertWoodSubtotal, 2) }}</span>
                </div>
                @endif

                @if($notCertMetalSubtotal > 0)
                <div class="d-flex justify-content-between">
                    <span>Non-Certified Metal:</span>
                    <span>${{ number_format($notCertMetalSubtotal, 2) }}</span>
                </div>
                @endif

                @if($notCertSteelSubtotal > 0)
                <div class="d-flex justify-content-between">
                    <span>Non-Certified Steel:</span>
                    <span>${{ number_format($notCertSteelSubtotal, 2) }}</span>
                </div>
                @endif

                <hr>
                <div class="d-flex justify-content-between fw-bold">
                    <span>Total:</span>
                    <span>${{ number_format($grandTotal, 2) }}</span>
                </div>

            </div>
        </div>




    </div>
</body>

</html>