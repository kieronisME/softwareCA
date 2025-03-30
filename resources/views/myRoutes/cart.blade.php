@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if($woodProducts->isEmpty())
        <p>Your cart is empty</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($woodProducts as $product)
                <tr>
                    <td>{{ $product->Product_name }}</td>
                    <td>${{ $product->Price }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>${{ $product->Price * $product->pivot->quantity }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection