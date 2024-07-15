<!-- resources/views/categories/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
</head>
<body>
    <h2>Categories</h2>

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <a href="{{ route('categories.create') }}">Create New Category</a>

    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    @if ($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}">Show</a>
                    <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
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
