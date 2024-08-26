<h1>{{ $gallery->name }}</h1>
<p>{{ $gallery->description }}</p>
<h2>Series</h2>
@foreach ($gallery->series as $series)
    <div>
        <h3>{{ $series->name }}</h3>
        <p>{{ $series->description }}</p>
        <!-- Display Series Content -->
    </div>
@endforeach

<h2>Images</h2>
@foreach ($gallery->images as $image)
    <div>
        <h3>{{ $image->title }}</h3>
        <img src="{{ $image->file_path }}" alt="{{ $image->title }}">
    </div>
@endforeach

<a href="{{ route('galleries.index') }}">Back to Galleries</a>
<a href="{{ route('galleries.edit', $gallery) }}">Edit Gallery</a>
<form action="{{ route('galleries.destroy', $gallery) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Gallery</button>
</form>
