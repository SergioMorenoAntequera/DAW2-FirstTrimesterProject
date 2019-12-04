@extends('../layouts/master')

@section('title', 'Indice de Generos')

@section('innerTitle')
    Índice de Generos
@endsection
@section('titleButton')
    Iniciar sesión
@endsection

@section('sidebar')
    Listado de los géneros
@endsection

@section('content')

    @auth
    <a href="{{route("genre.create")}}" style="position: fixed;
            top: 100px;
            right: 35px;">
        <img src="img/icons/plus.png" height="50" width="50">
    </a>
    @endauth

    <div style="text-align: left;">
        <div class="row">
            <div class="col-3">
                <ul>
                    <b id="listHeader"> TODOS LOS GÉNEROS </b>
                    <ul>
                        @foreach ($genres as $genre)
                            <li><a id="listElement" href="#{{$genre->description}}">{{$genre->description}}</a></li>
                        @endforeach
                    </ul>
                </ul>
            </div>

            <div class="col-8">
                @foreach ($genres as $genre)
                    <!-- Cada uno de los div que representarán un género -->
                    <div style="margin-top: 5px; width: 100%" class="card">
                        <div class="card-head text-success">
                            <a style="color: green" href="{{route('genre.show', $genre->id)}}">
                                <h3 id="{{$genre->description}}" style="margin-left: 20px; margin-top: 20px;" style="border-left: 5px;">{{$genre->description}}</h3>
                            </a>
                        </div>

                        <div style="padding-top: 10px" class="card-body">
                            <!-- Detalles de cada película -->
                            {{$genre->details}}<br>
                            @auth
                                <div style="margin-top:5px;  width: 250px">
                                    <!-- Boton para modificar -->
                                    <a href="{{route('genre.edit', $genre->id)}}"> 
                                        <Button style="float:left; width: 100px; margin-top: 5px"> Modificar </Button> 
                                    </a> 
                                    
                                    <!-- Boton para borrar -->
                                    <form method="POST" action="{{route('genre.destroy', $genre->id)}}">
                                        @csrf
                                        @method("DELETE")
                                        <input style="float:left; width: 100px; margin-top: 5px; margin-left: 5px" type="submit" value="Eliminar"> 
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>

                @endforeach
                <br>
            </div>
        </div>
    </div>
@endsection