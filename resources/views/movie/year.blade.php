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
                    @if (strpos($movie->cover, "filmaffinity"))
                        <img style="margin-top: 10px;" src="{{$movie->cover}}" width="285px" height="400">
                    @else
                        <img style="margin-top: 10px;" src="/img/covers/{{$movie->cover}}" width="285px" height="400">
                    @endif
                    <figcaption class="figure-caption">{{$movie->title}}</figcaption>
                </a>
            </figure>
        @endif
    @endforeach
@endsection