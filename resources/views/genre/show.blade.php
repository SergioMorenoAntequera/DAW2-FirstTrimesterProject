@extends('../layouts/master')

@section('title', 'Página de género')

@section('sidebar')
    Películas del género: {{$genre->description}}
@endsection

@section('content')
    @foreach ($movies as $movie)
        @foreach ($movie->genres as $movieGenre)
            <!-- Donde aparecen las películas de mismo género -->
            @if ($movieGenre->description == $genre->description)
            <figure style="width: 24%" class="figure">
                    <a href="{{route('movie.show', $movie->id)}}">
                        <!-- Foto -->
                        @if (strpos($movie->cover, "filmaffinity"))
                            <img style="margin-top: 10px;" src="{{$movie->cover}}" width="95%" height="400">
                        @else
                            <img style="margin-top: 10px;" src="/img/covers/{{$movie->cover}}" width="95%" height="400">
                        @endif
                        <figcaption class="figure-caption">{{$movie->title}}</figcaption>
                    </a>
                </figure>
            @endif
        @endforeach
    @endforeach
@endsection