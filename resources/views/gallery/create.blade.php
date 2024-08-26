<h1>Create Gallery</h1>
<form action="{{ route('galleries.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <button type="submit">Create Gallery</button>
</form>
<a href="{{ route('galleries.index') }}">Back to Galleries</a>
