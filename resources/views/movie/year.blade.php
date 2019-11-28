@extends('../layouts/master')

@section('title', 'Peliculas de un año')

@section('sidebar')
    Películas del año: {{$year}}
@endsection

@section('content')
    @foreach ($movies as $movie)
        @if ($movie->year == $year)
            <figure class="figure">
                <a href="{{route('movie.show', $movie->id)}}">
                    <img style="height: 250px;" src="/img/covers/{{$movie->cover}}"class="figure-img img-fluid rounded" alt="Película">
                    <figcaption class="figure-caption">{{$movie->title}}</figcaption>
                </a>
            </figure>
        @endif
    @endforeach
@endsection