<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Your Cart</h1>
    @if ($cart && $cart->items->count())
        <ul>
            @foreach ($cart->items as $item)
                <li>
                    {{ $item->item->name }} - {{ $item->quantity }}
                    <form action="{{ url('/cart/edit/' . $item->item_id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="number" name="quantity" value="{{ $item->quantity }}">
                        <button type="submit">Update</button>
                    </form>
                    <form action="{{ url('/cart/remove/' . $item->item_id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <form action="{{ url('/order') }}" method="post">
            @csrf
            <button type="submit">Checkout</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
    
</body>
</html>