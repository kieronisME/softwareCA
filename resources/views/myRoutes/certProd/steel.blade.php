<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>i beg</title>
    <link rel="stylesheet" href="../c">
    <link href="../node_modules/bootstrap/dist/css/bootstrap-grid.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="bgContainer">
        <!-- <div class="navBarContainer"></div> -->
        <h1>Certified steel Products</h1>

        <a href="{{ route('myRoutes.CertifiedSteelCRUD.create') }}">
            <div class="btn btn-primary me-2">add a product</div>
        </a>

        <ul>
            @foreach ($steelProducts as $certifiedSteelProducts)
            <li>
                <strong>{{ $certifiedSteelProducts->Product_name }}</strong><br>
                Certificate: {{ $certifiedSteelProducts->Certificate }}<br>
                Price: ${{ $certifiedSteelProducts->Price }}<br>
                Quantity: {{ $certifiedSteelProducts->quantity }}<br>
                CO2: {{ $certifiedSteelProducts->co2 }}<br>
                Weight: {{ $certifiedSteelProducts->weight }} {{ $certifiedSteelProducts->weight_unit }}<br>
                About: {{ $certifiedSteelProducts->About }}
            </li>

            <form action="{{ route('cart.add.steel', $certifiedSteelProducts) }}" method="POST" class="d-inline">
                @csrf
                <input type="number" name="quantity" value="1" min="1" max="{{ $certifiedSteelProducts->quantity }}"
                    class="form-control d-inline-block" style="width: 80px;">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>

            <form action="{{ route('crud.Wooddestroy', $certifiedSteelProducts) }}" method="POST" onsubmit="return confirm('This action is permanent!');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-800 rounded-lg mr-4 my-3 text-black py-1 px-1 hover:bg-red-300">
                    Delete
                </button>
            </form>

            <form action="{{ route('crud.Woodedit', $certifiedSteelProducts) }}">
                @csrf
                <button type="submit" class="bg-red-800 rounded-lg mr-4 my-3 text-black py-1 px-1 hover:bg-red-300">
                    edit
                </button>
            </form>

            <div> ------------------------------------------ </div>
            <div>


                @endforeach
        </ul>
    </div>