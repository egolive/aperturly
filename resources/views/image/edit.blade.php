<h1>Edit Image</h1>
<form action="{{ route('images.update', $image) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $image->title }}">
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $image->description }}</textarea>
    </div>
    <div>
        <label for="file_path">Image Path:</label>
        <input type="text" id="file_path" name="file_path" value="{{ $image->file_path }}" required>
    </div>
    <button type="submit">Update Image</button>
</form>
<a href="{{ route('images.index') }}">Back to Images</a>
<form action="{{ route('images.destroy', $image) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Image</button>
</form>
