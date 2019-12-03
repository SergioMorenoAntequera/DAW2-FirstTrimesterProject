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

    <a href="{{route("movie.scan")}}" style="position: fixed;
            top: 100px;
            left: 35px; ">
            <img src="img/icons/scan.png" height="50" width="50">
    </a>
    @endauth

    <input style="width: 50%" id='search' type='text' placeholder='Buscar por nombres..'> 
    <br><br>
    <script type="text/javascript" src="js/SearchBar.js"></script>

    <div class="row">
        <div class="col-12">
            @foreach ($movies as $movie)
                <div class="element" style="position: relative; float:left; width:25%; height: 560px;">
                    <!-- Añadimos la imagen y el título -->
                    <a href='{{route('movie.show', $movie->id)}}'> 
                        @if (strpos($movie->cover, "filmaffinity"))
                            <img style="margin-top: 10px;"  src="{{$movie->cover}}" width="95%" height="400">
                        @else
                            <img style="margin-top: 10px;"  src="/img/covers/{{$movie->cover}}" width="95%" height="400">
                        @endif
                    </a>
                    <br>
                    <b class="nameSearch" style="font-size: 18px">{{$movie->title}}</b>
                    <br>
                    <b style="color: #c18e0c">{{$movie->rating}}/10⭐</b>
                    <b style="color: #4d4d4d">{{$movie->duration}} min🕒</b>
                    <br>
                    
                    @auth
                        <a href="{{route('movie.edit', $movie->id)}}"> 
                            <Button style="position:absolute; left: 40px; bottom:50; margin-top: 5px"> 
                                Modificar 
                            </Button> 
                        </a> 
                        
                        <form method="POST" action="{{route('movie.destroy', $movie->id)}}">
                            @csrf
                            @method("DELETE")
                            <BUTTON class="btn-delete" style="position:absolute; right: 40px; bottom:50; margin-top: 5px;" type="submit" >Eliminar</Button> 
                        </form>
                    @endauth
                </div>
            @endforeach
            
        </div>
    </div>
    <script src="js/DeleteButton.js"></script>
@endsection