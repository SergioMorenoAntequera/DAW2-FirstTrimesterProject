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
        <p><b>Duración: </b> {{$movie->duration}} minutos</p>
        <p><b>Valoración: </b> {{$movie->rating}} / 10</p>
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
        
        <!-- PARTE DE REPRODUCCIÓN DE LA PELÍCULA -->
        <div style="margin-top: 100px;" class="card text-center">
          <div class="card-header text-success border border-success">
            <h3>Película</h3>
          </div>

          <div class="card-body">
                <div class="row justify-content-md-center">
                    <!--
                    <div class="col-8">
                        <video src="/vid/{{$movie->filename}}" controls> </video>
                    </div>
                    -->

                    <div class="col-8">
                        <video controls>
                        <source src="/vid/{{$movie->filename}}" type="video/mp4">
                        <source src="/vid/{{$movie->filename}}" type="video/ogg">
                        <source src="/vid/{{$movie->filename}}" type="video/omv">
                        Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                
          </div>
        </div>
    </div>
    
@endsection