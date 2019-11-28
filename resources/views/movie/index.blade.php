@extends('../layouts/master')

@section('title', 'Indice de Películas')

@section('innerTitle')
    Índice de Peliculas
@endsection

@section('sidebar')
    En este menu podemos ver la información de todos las peliculas
@endsection

@section('content')

    @auth
    <a href="{{route("movie.create")}}" style="position: fixed;
            top: 100px;
            right: 35px; ">
            <img src="img/icons/plus.png" height="50" width="50">
    </a>
    @endauth

    <input style="width: 50%" id='search' type='text' placeholder='Buscar por nombres..'> 
    <br><br>
    <script type="text/javascript" src="/js/SearchBar.js"></script>

    @foreach ($movies as $movie)
        <div style="float:left; width:25%; margin-bottom: 30px;">
            <b><span>{{$movie->title}}</span><b>
                         <a href='{{route('movie.show', $movie->id)}}'> 
                <img style="margin-top: 10px;"  src="/img/covers/{{$movie->cover}}" width="95%" height="400">
            </a>

            @auth
                <a href="{{route('movie.edit', $movie->id)}}"> 
                    <Button style="margin-top: 5px"> Modificar </Button> 
                </a> 
                
                <form method="POST" action="{{route('movie.destroy', $movie->id)}}">
                    @csrf
                    @method("DELETE")
                    <input style="margin-top: 5px;" type="submit" value="Eliminar"> 
                </form>
            @endauth
        </div>
    @endforeach
    
@endsection