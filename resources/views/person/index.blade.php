@extends('../layouts/master')

@section('title', 'Indice de usuarios')

@section('innerTitle')
    Indice de Actores y directores
@endsection

@section('sidebar')
    En este menu podemos ver la información de actores y directores
@endsection

@section('content')

    @auth
    <a href="{{route("person.create")}}" style="position: fixed;
        top: 100px;
        right: 35px; ">
        <img src="img/icons/plus.png" height="50" width="50">
    </a>
    @endauth

    <div class="row text-left">
        <div class="col-3">
            <!-- START LEFT PANEL -->
            <ul>
                <b id="listHeader"> ACTORES  </b>
                <ul>
                    @foreach ($people as $person)
                        @if (count($person->moviesActed) > 0)
                            <li><a id="listElement" href="{{route('person.show', $person->id)}}">{{$person->name}}</a></li>
                        @endif  
                    @endforeach
                </ul>
            </ul>
            <ul>
                <b id="listHeader"> DIRECTORES </b>
                <ul>
                    @foreach ($people as $person)
                        @if (count($person->moviesDirected) > 0)
                            <li><a id="listElement" href="{{route('person.show', $person->id)}}">{{$person->name}}</a></li>
                        @endif  
                    @endforeach
                </ul>
            </ul>
            <ul>
                <b id="listHeader"> OTROS </b>
                <ul>
                    @foreach ($people as $person)
                        @if (count($person->moviesDirected) == 0 && count($person->moviesActed) == 0)
                            <li><a id="listElement"href="{{route('person.show', $person->id)}}">{{$person->name}}</a></li>
                        @endif  
                    @endforeach
                </ul>
            </ul>
        </div>
        <!-- END LEFT PANEL-->
        <!-- START RIGHT PANEL-->
        <div class="col-8" style="text-align: center">

            <input style="width: 50%" id='search' type='text' placeholder='Buscar por nombres..'> 
            <br><br>
            <script type="text/javascript" src="/js/SearchBar.js"></script>
            
            @foreach ($people as $person)
                <!-- Principio del div de cada persona -->
                <div class="element" style="float:left; width:25%; margin-top: 10px;">
                    <!-- Nombre de la persona -->
                    <b><span class="nameSearch">{{$person->name}}</span><b>

                    <!-- Foto de la persona -->
                    <a href='{{route('person.show', $person->id)}}'> 
                        <img src="/img/people/{{$person->photo}}" width="90%" height="190">
                    </a>

                    @auth
                    <!-- Botones de modificar y eliminar -->
                    <div style="padding-top: 5px;">
                        <!-- Boton  de modificar -->
                        <a href="{{route('person.edit', $person->id)}}"> 
                            <Button> Modificar </Button> 
                        </a> 
                        
                        <!-- Boton de eliminar dentro de su form -->
                        <form style="padding-top: 5px;" method="POST" action="{{route('person.destroy', $person->id)}}">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Eliminar"> 
                        </form>
                    </div>
                    @endauth
                </div>
            @endforeach
        </div>
        <!-- END RIGHT PANEL -->  
    </div>
@endsection