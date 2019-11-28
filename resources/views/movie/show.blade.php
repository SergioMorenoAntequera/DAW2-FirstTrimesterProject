@extends('../layouts/master')

@section('title', 'Mostrar Película')

@section('innerTitle')
    Película
@endsection

@section('sidebar')
    {{$movie->title}}
@endsection

@section('content')
    <div style="border-bottom: 0px; float:left; margin-right: 15px">
        <img src="/img/covers/{{$movie->cover}}" height="460px" width="300px;">
    </div>

    <div class="text-left"> 
        <h4><b>Ficha de la película</b></h4>
        <p><b>Title: </b> {{$movie->title}}</p>
        <p><b>Año: </b>
        <a href="{{route('movie.year', $movie->year)}}">
            {{$movie->year}}</p>
        </a>
        <p><b>Duración: </b> {{$movie->duration}}</p>
        <p><b>Valoración: </b> {{$movie->rating}}</p>
        <p><b>Generos: </b>
            @foreach ($movie->genres as $genre)
                | <a style="color: #28a745" href="{{route('genre.show', $genre->id)}}"> {{$genre->description}}</a>
            @endforeach | 
        </p>
        
        <div>
        <b>Dirección: </b> <br>
        @foreach ($movie->directors as $director)
            <figure class="figure">
                <a href="{{route('person.show', $director->id)}}">
                    <img style="height: 175px; width: 132px" src="/img/people/{{$director->photo}}"class="figure-img img-fluid rounded" alt="Nombre del director">
                    <figcaption class="figure-caption">{{$director->name}}</figcaption>
                </a>
            </figure>
        @endforeach
        </div>

        <b>Reparto: </b> <br>
        @foreach ($movie->actors as $actor)
            <figure class="figure">
                <a href="{{route('person.show', $actor->id)}}">
                    <img style="height: 175px; width: 132px" src="/img/people/{{$actor->photo}}"class="figure-img img-fluid rounded" alt="Nombre del Actor">
                    <figcaption class="figure-caption">{{$actor->name}}</figcaption>
                </a>
            </figure>
        @endforeach 
        
        <br><p><a href="{{$movie->external_url}}"><b>Más información</b></a></p>
        
    </div>
    
@endsection