@extends('../layouts/master')

@section('title', 'Mostrar Película')

@section('innerTitle')
    Película
@endsection

@section('sidebar')
    {{$movie->title}}
@endsection

@section('content')
    <div style="float:left; margin-right: 15px">
        <img src="/img/covers/{{$movie->cover}}" width="320px" height="460px">
        <br><br>
    </div>

    <div class="text-left"> 
        <h4><b>Ficha de la película</b></h4>
        <p><b>Title: </b> {{$movie->title}}</p>
        <p><b>Año: </b> {{$movie->year}}</p>
        <p><b>Duración: </b> {{$movie->duration}}</p>
        <p><b>Valoración: </b> {{$movie->rating}}</p>
        <p><b>Generos: </b>
        @foreach ($movie->genres as $genre)
             | {{$genre->description}}
        @endforeach |
        </p>
        <p><b>Directores: </b>
        @foreach ($movie->directors as $director)
             | {{$director->name}}  
        @endforeach |
        </p>
        <p><b>Actores: </b>
        @foreach ($movie->actors as $actor)
             | {{$actor->name}} 
        @endforeach |
        </p>
        <p><a href="{{$movie->external_url}}"><b>Más información</b></a></p>
        
    </div>
    
@endsection