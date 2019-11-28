@extends('../layouts/master')

@section('title', 'Página de género')

@section('sidebar')
    Películas del género: {{$genre->description}}
@endsection

@section('content')
    @foreach ($movies as $movie)
        @foreach ($movie->genres as $movieGenre)
            @if ($movieGenre->description == $genre->description)
                <a href="{{route('movie.show', $movie->id)}}">
                    <img src="/img/covers/{{$movie->cover}}" width="200px" height="300px">
                </a>
            @endif
        @endforeach
    @endforeach
@endsection