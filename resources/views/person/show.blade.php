@extends('../layouts/master')

@section('title', 'Mostrar Persona')

@section('innerTitle')
    Persona
@endsection

@section('sidebar')
    {{$person->name}}
@endsection

@section('content')
    <div style="float:left; margin-right: 15px">
        <img src="/img/people/{{$person->photo}}" width="320px" height="480px">
        <br><br>
    </div>

    <div class="text-left">



        <div>
            <p><b>Dirección: </b><br>
            @foreach ($person->moviesDirected as $movie)
                    
                <a href="{{route('movie.show', $movie->id)}}">
                    <img src="/img/covers/{{$movie->cover}}" alt="Cover" height="200" width="120">
                </a>
            @endforeach
            </p>
        </div>

        <div>
            <p><b>Filmografía: </b><br>
            @foreach ($person->moviesActed as $movie)
                <a href="{{route('movie.show', $movie->id)}}">
                    <img src="/img/covers/{{$movie->cover}}" alt="Cover" height="175" width="100">
                </a>
            @endforeach
            </p>
        </div>
        
        <a href="{{$person->external_url}}"><b>Más información</b></a>
        <br>
    </div>
    
@endsection