@extends('../layouts/master')

@section('title', 'Peliculas de un año')

@section('sidebar')
    Películas del año: {{$year}}
@endsection

<!-- En esta vista se van a desplegar todas las epliculas de un cierto año -->
@section('content')
    @foreach ($movies as $movie)
        <!-- Si tiene el mismo año que nuestra película lo mostramos por pantalla -->
        @if ($movie->year == $year)
            <figure class="figure">
                <a href="{{route('movie.show', $movie->id)}}">
                    <!-- Ponemos la imgen -->
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