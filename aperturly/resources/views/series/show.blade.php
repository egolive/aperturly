<h1>{{ $series->name }}</h1>
<p>{{ $series->description }}</p>

<h2>Images</h2>
@foreach ($series->images as $image)
    <div>
        <h3>{{ $image->title }}</h3>
        <img src="{{ $image->file_path }}" alt="{{ $image->title }}">
    </div>
@endforeach

<a href="{{ route('series.index') }}">Back to Series</a>
<a href="{{ route('series.edit', $series) }}">Edit Series</a>
<form action="{{ route('series.destroy', $series) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Series</button>
</form>
