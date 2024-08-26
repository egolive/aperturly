<h1>Images</h1>
@foreach ($images as $image)
    <div>
        <h2>{{ $image->title }}</h2>
        <img src="{{ $image->file_path }}" alt="{{ $image->title }}">
        <p>{{ $image->description }}</p>
        <a href="{{ route('images.show', $image) }}">View Image</a>
        <a href="{{ route('images.edit', $image) }}">Edit Image</a>
        <form action="{{ route('images.destroy', $image) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Image</button>
        </form>
    </div>
@endforeach
<a href="{{ route('images.create') }}">Upload New Image</a>
