<h1>Edit Portfolio</h1>
<form action="{{ route('portfolios.update', $portfolio) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $portfolio->name }}" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $portfolio->description }}</textarea>
    </div>
    <button type="submit">Update Portfolio</button>
</form>
<a href="{{ route('portfolios.index') }}">Back to Portfolios</a>
<form action="{{ route('portfolios.destroy', $portfolio) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Portfolio</button>
</form>
