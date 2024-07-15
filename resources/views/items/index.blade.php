<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
</head>
<body>
    <h2>Items</h2>

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <a href="{{ route('items.create') }}">Create New Item</a>

    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('items.show', $item->id) }}">Show</a>
                    <a href="{{ route('items.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
