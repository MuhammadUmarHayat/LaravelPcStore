<!DOCTYPE html>
<html>
<head>
    <title>Show Item</title>
</head>
<body>
    <h2>Show Item</h2>
    <p>Name: {{ $item->name }}</p>
    <p>Description: {{ $item->description }}</p>
    @if($item->image)
        <img src="{{ asset('storage/' . $item->image) }}" width="200">
    @endif
    <a href="{{ route('items.index') }}">Back</a>
</body>
</html>
