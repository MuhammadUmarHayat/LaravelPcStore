<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h2>Edit Item</h2>

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

    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $item->name }}">
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description">{{ $item->description }}</textarea>
        </div>
        <div>
            <label>Image:</label>
            <input type="file" name="image">
            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" width="100">
            @endif
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>
