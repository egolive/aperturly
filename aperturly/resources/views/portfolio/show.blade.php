<h1>{{ $portfolio->name }}</h1>
<p>{{ $portfolio->description }}</p>
<h2>Galleries</h2>
@foreach ($portfolio->galleries as $gallery)
    <div>
        <h3>{{ $gallery->name }}</h3>
        <p>{{ $gallery->description }}</p>
        <!-- Display Gallery Content -->
    </div>
@endforeach

<h2>Series</h2>
@foreach ($portfolio->series as $series)
    <div>
        <h3>{{ $series->name }}</h3>
        <p>{{ $series->description }}</p>
        <!-- Display Series Content -->
    </div>
@endforeach

<h2>Images</h2>
@foreach ($portfolio->images as $image)
    <div>
        <h3>{{ $image->title }}</h3>
        <img src="{{ $image->file_path }}" alt="{{ $image->title }}">
    </div>
@endforeach

<a href="{{ route('portfolios.index') }}">Back to Portfolios</a>
<a href="{{ route('portfolios.edit', $portfolio) }}">Edit Portfolio</a>
<form action="{{ route('portfolios.destroy', $portfolio) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Portfolio</button>
</form>
