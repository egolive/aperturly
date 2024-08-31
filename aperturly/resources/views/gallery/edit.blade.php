<h1>Edit Gallery</h1>
<form action="{{ route('galleries.update', $gallery) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $gallery->name }}" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $gallery->description }}</textarea>
    </div>
    <button type="submit">Update Gallery</button>
</form>
<a href="{{ route('galleries.index') }}">Back to Galleries</a>
<form action="{{ route('galleries.destroy', $gallery) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Gallery</button>
</form>
