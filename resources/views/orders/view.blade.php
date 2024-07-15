<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Your Orders</h1>
    @if ($orders->count())
        <ul>
            @foreach ($orders as $order)
                <li>
                    Order #{{ $order->id }} - {{ $order->status }}
                    <ul>
                        @foreach ($order->items as $item)
                            <li>
                                {{ $item->item->name }} - {{ $item->quantity }} x ${{ $item->price }}
                            </li>
                        @endforeach
                    </ul>
                    <p>Total: ${{ $order->total }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>You have no orders.</p>
    @endif
</body>
</html>