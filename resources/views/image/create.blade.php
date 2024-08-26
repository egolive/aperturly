<h1>Upload Image</h1>
<form action="{{ route('images.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div>
        <label for="file_path">Image Path:</label>
        <input type="text" id="file_path" name="file_path" required>
    </div>
    <button type="submit">Upload Image</button>
</form>
<a href="{{ route('images.index') }}">Back to Images</a>
