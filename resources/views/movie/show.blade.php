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
        @if (strpos($movie->cover, "filmaffinity"))
            <img src="{{$movie->cover}}" height="460px" width="300px;">
        @else
            <img src="/img/covers/{{$movie->cover}}" height="460px" width="300px;">
        @endif
        
    </div>

    <div class="text-left"> 
        <h4><b>Ficha de la película</b></h4>
        <p><b>Title: </b> {{$movie->title}}</p>
        <p><b>Año: </b>
        <a href="{{route('movie.year', $movie->year)}}">
            {{$movie->year}}</p>
        </a>
        <p><b style="color: #4d4d4d">Duración: </b> {{$movie->duration}} min🕒</p>
        <p><b style="color: #c18e0c">Valoración: </b> {{$movie->rating}} / 10⭐</p>
        <p><b>Generos: </b>
            @foreach ($movie->genres as $genre)
                | <a style="color: #28a745" href="{{route('genre.show', $genre->id)}}"> {{$genre->description}}</a>
            @endforeach | 
        </p>
        
        <div>
        <b>Dirección: </b> <br>
        @forelse ($movie->directors as $director)
            <figure class="figure">
                <a href="{{route('person.show', $director->id)}}">
                    <img style="height: 175px; width: 132px" src="/img/people/{{$director->photo}}"class="figure-img img-fluid rounded" alt="Nombre del director">
                    <figcaption class="figure-caption">{{$director->name}}</figcaption>
                </a>
            </figure>
            @empty
            <p> No se ha introducido ningún director </p>
        @endforelse
        </div>

        <b>Reparto: </b> <br>
        @forelse ($movie->actors as $actor)
            <figure class="figure">
                <a href="{{route('person.show', $actor->id)}}">
                    <img style="height: 175px; width: 132px" src="/img/people/{{$actor->photo}}"class="figure-img img-fluid rounded" alt="Nombre del Actor">
                    <figcaption class="figure-caption">{{$actor->name}}</figcaption>
                </a>
            </figure>
            @empty
            <p> No se ha introducido ningún director </p>
        @endforelse
        
        <br><p><a href="{{$movie->external_url}}"><b>Más información</b></a></p>
        
        <!-- PARTE DE REPRODUCCIÓN DE LA PELÍCULA -->
        <br><br>
        <div style="margin-top: 100px;" class="card text-center">
          <div class="card-header text-success border border-success">
            <h3>Película</h3>
          </div>

          <div class="card-body">
                <div class="row justify-content-md-center">
                    <div class="col-8">
                        <video controls>
                        <source src="/movies/{{$movie->filename}}" type="video/mp4">
                        <source src="/movies/{{$movie->filename}}" type="video/omv">
                        Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                
          </div>
        </div>
    </div>
    
@endsection