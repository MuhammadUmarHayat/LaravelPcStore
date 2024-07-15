<!DOCTYPE html>
<html>
<head>
    <title>Items in {{ $category->name }}</title>
</head>
<body>
    <h1>Items in {{ $category->name }}</h1>

    @if ($items->isEmpty())
        <p>No items found in this category.</p>
    @else
        <ul>
            @foreach ($items as $item)
                <li>
                    <strong>{{ $item->name }}</strong><br>
                    Description: {{ $item->description }}<br>
                    Price: {{ $item->price }}<br>
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="100">
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
