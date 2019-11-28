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
        <img src="/img/people/{{$person->photo}}" height="410px">
    </div>

    <div class="text-left">
        
            <h4><b>Ficha de la persona</b></h4>
            <b>Nombre:</b><br>
            {{$person->name}}

            <br><br>

            <b>Dirección:</b><br>
            @foreach ($person->moviesDirected as $movie)
                <figure class="figure">
                    <a href="{{route('movie.show', $movie->id)}}">
                        <img style="height: 250px" src="/img/covers/{{$movie->cover}}"class="figure-img img-fluid rounded" alt="Nombre del Actor">
                        <figcaption class="figure-caption">{{$movie->title}}</figcaption>
                    </a>
                </figure>
            @endforeach
            
            <br>
                
            <b>Filmografía:</b><br>
            @foreach ($person->moviesActed as $movie)
                <figure class="figure">
                    <a href="{{route('movie.show', $movie->id)}}">
                        <img style="height: 250px;" src="/img/covers/{{$movie->cover}}"class="figure-img img-fluid rounded" alt="Nombre del Actor">
                        <figcaption class="figure-caption">{{$movie->title}}</figcaption>
                    </a>
                </figure>
            @endforeach

        <br>
        <a href="{{$person->external_url}}"><b>Más información</b></a>
        <br><br>
    </div>
    
@endsection