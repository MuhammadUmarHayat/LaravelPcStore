<!-- resources/views/categories/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Show Category</title>
</head>
<body>
    <h2>Category Details</h2>

    <p><strong>Name:</strong> {{ $category->name }}</p>
    <p><strong>Description:</strong> {{ $category->description }}</p>
    <p><strong>Image:</strong> 
        @if ($category->image)
            <img src="{{ asset('storage/' . $category->image) }}" width="200">
        @else
            No image available
        @endif
    </p>

    <a href="{{ route('categories.index') }}">Back to Categories</a>
</body>
</html>
