<h1>Galleries</h1>
@foreach ($galleries as $gallery)
    <div>
        <h2>{{ $gallery->name }}</h2>
        <p>{{ $gallery->description }}</p>
        <a href="{{ route('galleries.show', $gallery) }}">View Gallery</a>
        <a href="{{ route('galleries.edit', $gallery) }}">Edit Gallery</a>
        <form action="{{ route('galleries.destroy', $gallery) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Gallery</button>
        </form>
    </div>
@endforeach
<a href="{{ route('galleries.create') }}">Create New Gallery</a>
