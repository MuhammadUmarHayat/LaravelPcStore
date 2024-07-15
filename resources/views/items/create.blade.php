<!-- resources/views/items/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Item</title>
</head>
<body>
    <h2>Create New Item</h2>

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

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <div>
            <label>Category:</label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label>Price:</label>
            <input type="number" name="price" value="{{ old('price') }}">
        </div>
        
        <div>
            <label>Image:</label>
            <input type="file" name="image">
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
