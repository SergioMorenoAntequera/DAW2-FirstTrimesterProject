@extends('../layouts/master')

@section('title', 'Mostrar Persona')

@section('innerTitle')
    Persona
@endsection

@section('sidebar')
    {{$person->name}}
@endsection

@section('content')
    <div style="float:left; margin-right: 15px; width: 303px">
        <img src="/img/people/{{$person->photo}}" height="410px">
    </div>

    <div class="text-left">
        
            <h4><b>Ficha de la persona</b></h4>
            <b>Nombre:</b><br>
            {{$person->name}}

            <br><br>

            <b>Dirección:</b><br>
            @forelse ($person->moviesDirected as $movie)
                <figure class="figure">
                    <a href="{{route('movie.show', $movie->id)}}">
                        @if (strpos($movie->cover, "filmaffinity"))
                            <img style="height: 250px" src="{{$movie->cover}}"class="figure-img img-fluid rounded" alt="Nombre del Actor">
                        @else
                            <img style="height: 250px" src="/img/covers/{{$movie->cover}}"class="figure-img img-fluid rounded" alt="Nombre del Actor">
                        @endif
                            
                        <figcaption class="figure-caption">{{$movie->title}}</figcaption>
                    </a>
                </figure>
            @empty
                <p style="padding-bottom: 230px;">No ha sido director en ninguna película</p>
            @endforelse
            <br>
                
            <b>Filmografía:</b><br>
            @forelse ($person->moviesActed as $movie)
                <figure class="figure">
                    <a href="{{route('movie.show', $movie->id)}}">
                        @if (strpos($movie->cover, "filmaffinity"))
                            <img style="height: 250px;" src="{{$movie->cover}}"class="figure-img img-fluid rounded" alt="Nombre del Actor">
                        @else
                            <img style="height: 250px;" src="/img/covers/{{$movie->cover}}"class="figure-img img-fluid rounded" alt="Nombre del Actor">
                        @endif
                        <figcaption class="figure-caption">{{$movie->title}}</figcaption>
                    </a>
                </figure>
            @empty
                <p>No ha sido actor en ninguna película</p>
            @endforelse
        <br>
        <a href="{{$person->external_url}}"><b>Más información</b></a>
        <br><br>
    </div>
    
@endsection