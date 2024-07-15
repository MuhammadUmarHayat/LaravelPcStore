<!-- resources/views/categories/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>
    <h2>Edit Category</h2>

    @if ($errors->any())
        <div>
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $category->name }}">
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description">{{ $category->description }}</textarea>
        </div>
        <div>
            <label>Current Image:</label>
            @if ($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" width="100">
            @else
                <p>No image available</p>
            @endif
        </div>
        <div>
            <label>New Image:</label>
            <input type="file" name="image">
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>
