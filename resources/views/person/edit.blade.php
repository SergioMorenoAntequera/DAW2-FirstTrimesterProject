@extends('../layouts/master')

@section('title', 'Modificar Pelicula')

@section('innerTitle')
    Modificando {{$person->name}}
@endsection

@section('sidebar')
    Modificando "{{$person->name}}"
@endsection

@section('content')

        <!-- Imagen -->
        <div id="image-upload" style="float:left; margin-right: 15px;">
            <img style="margin-left: 0px; cursor: pointer" src="/img/people/{{$person->photo}}" width="355px" height="460px">
            <input id="file-input" type="file"/>
            <br>
        </div>

        <!-- Campos para editar de la persona -->
        <div class="text-left"> 
            <h4><b>Modificado película</b></h4>
            <form style="display: inline" method="POST" action="{{route('person.update', $person->id)}}" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                <input type="hidden" name="id" value="{{$person->id}}">

                <!-- LEFT -->
                <div style="float:left; width: 28%; height: ‭432‬px;"> 
                    <div class="form-group">
                        <label>Nombre</label>
                        <input style="width: 100%" type="text" class="form-control" name="name" placeholder="Nombre" value="{{$person->name}}" required>
                    </div>
                    <div class="form-group">
                        <label>URL Externa</label>
                        <input style="width: 100%" type="text" class="form-control" name="external_url" placeholder="URL externa" value="{{$person->external_url}}" required>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="photo" accept="image/png, image/jpeg">
                    </div>
                    <br>
                </div>
                <!-- END LEFT -->
                
                <!-- RIGHT -->
                <div style="float: right; width: 37%; height: 530px;" > 
                    <div class="form-group">
                        <label>Películas actuadas</label>
                        <select multiple class="form-control" style="width: 90%; height: 100px" name="moviesActed[]">
                            @foreach ($movies as $movie)
                                <option
                                @foreach ($person->moviesActed as $movieAux)
                                    @if ($movieAux->title == $movie->title)
                                        selected 
                                    @endif
                                @endforeach
                                value="{{$movie->id}}">{{$movie->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Películas Dirigidas</label>
                        <select multiple class="form-control" style="width: 90%; height: 100px" name="moviesDirected[]">
                            @foreach ($movies as $movie)
                                <option
                                @foreach ($person->moviesDirected as $movieAux)
                                    @if ($movieAux->title == $movie->title)
                                        selected 
                                    @endif
                                @endforeach
                                value="{{$person->id}}">{{$movie->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <br><br><br>
                    <div style="width: 100%; text-align: center">
                        <br>
                        <button type="submit">MODIFICAR PERSONA</button>
                    </div>
                </div> <!-- END RIGHT -->
                
                <input type="hidden" name="filepath" placeholder="FilePath" value="{{$person->filepath}}" required><br>
            </form>
        </div>
@endsection