<h1>{{ $image->title }}</h1>
<img src="{{ $image->file_path }}" alt="{{ $image->title }}">
<p>{{ $image->description }}</p>

<a href="{{ route('images.index') }}">Back to Images</a>
<a href="{{ route('images.edit', $image) }}">Edit Image</a>
<form action="{{ route('images.destroy', $image) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Image</button>
</form>
