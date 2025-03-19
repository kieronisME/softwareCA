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
        <h1>Certified Wood Products</h1>

        <ul>
            @foreach ($woodProducts as $product)
            <li>
                <strong>{{ $product->Product_name }}</strong><br>
                Certificate: {{ $product->Certificate }}<br>
                Price: ${{ $product->Price }}<br>
                Quantity: {{ $product->quantity }}<br>
                CO2: {{ $product->co2 }}<br>
                Weight: {{ $product->weight }} {{ $product->weight_unit }}<br>
                About: {{ $product->About }}
            </li>
            @endforeach
        </ul>
    </div>









</body>

</html>