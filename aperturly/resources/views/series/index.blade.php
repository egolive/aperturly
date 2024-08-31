<h1>Series</h1>
@foreach ($series as $singleSeries)
    <div>
        <h2>{{ $singleSeries->name }}</h2>
        <p>{{ $singleSeries->description }}</p>
        <a href="{{ route('series.show', $singleSeries) }}">View Series</a>
        <a href="{{ route('series.edit', $singleSeries) }}">Edit Series</a>
        <form action="{{ route('series.destroy', $singleSeries) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Series</button>
        </form>
    </div>
@endforeach
<a href="{{ route('series.create') }}">Create New Series</a>
