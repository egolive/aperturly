<h1>Create Series</h1>
<form action="{{ route('series.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <button type="submit">Create Series</button>
</form>
<a href="{{ route('series.index') }}">Back to Series</a>
