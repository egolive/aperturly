<h1>Create Portfolio</h1>
<form action="{{ route('portfolios.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <button type="submit">Create Portfolio</button>
</form>
<a href="{{ route('portfolios.index') }}">Back to Portfolios</a>
