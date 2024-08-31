<h1>Portfolios</h1>
@foreach ($portfolios as $portfolio)
    <div>
        <h2>{{ $portfolio->name }}</h2>
        <p>{{ $portfolio->description }}</p>
        <a href="{{ route('portfolios.show', $portfolio) }}">View Portfolio</a>
        <a href="{{ route('portfolios.edit', $portfolio) }}">Edit Portfolio</a>
        <form action="{{ route('portfolios.destroy', $portfolio) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Portfolio</button>
        </form>
    </div>
@endforeach
<a href="{{ route('portfolios.create') }}">Create New Portfolio</a>
