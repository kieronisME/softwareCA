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

        <a href="{{ route('myRoutes.CRUD.create') }}">
            <div class="btn btn-primary me-2">add a product</div>
        </a>

        <ul>
            @foreach ($steelProducts as $certfiedSteelProducts)
            <li>
                <strong>{{ $certfiedSteelProducts->Product_name }}</strong><br>
                Certificate: {{ $certfiedSteelProducts->Certificate }}<br>
                Price: ${{ $certfiedSteelProducts->Price }}<br>
                Quantity: {{ $certfiedSteelProducts->quantity }}<br>
                CO2: {{ $certfiedSteelProducts->co2 }}<br>
                Weight: {{ $certfiedSteelProducts->weight }} {{ $certfiedSteelProducts->weight_unit }}<br>
                About: {{ $certfiedSteelProducts->About }}
            </li>

            <form action="{{ route('crud.destroy', $certfiedSteelProducts) }}" method="POST" onsubmit="return confirm('This action is permanent!');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-800 rounded-lg mr-4 my-3 text-black py-1 px-1 hover:bg-red-300">
                    Delete
                </button>
            </form>

            <form action="{{ route('crud.edit', $certfiedSteelProducts) }}">
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
