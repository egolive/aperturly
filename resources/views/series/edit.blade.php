<h1>Edit Series</h1>
<form action="{{ route('series.update', $series) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $series->name }}" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $series->description }}</textarea>
    </div>
    <button type="submit">Update Series</button>
</form>
<a href="{{ route('series.index') }}">Back to Series</a>
<form action="{{ route('series.destroy', $series) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Series</button>
</form>
