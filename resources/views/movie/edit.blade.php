@extends('../layouts/master')

@section('title', 'Modificar Pelicula')

@section('innerTitle')
    Modificando {{$movie->title}}
@endsection

@section('sidebar')
    Modificando "{{$movie->title}}"
@endsection

@section('content')

        <div style="float:left; margin-right: 15px; text-align: left">
            
            @if (strpos($movie->cover, "filmaffinity"))
                <img style="margin-left: 0px" src="{{$movie->cover}}" width="355px" height="460px">
            @else
                <img style="margin-left: 0px" src="/img/covers/{{$movie->cover}}" width="355px" height="460px">
            @endif
            <br>
        </div>

        <div class="text-left"> 
            <h4><b>Ficha de la película</b></h4>
            <form style="display: inline" method="POST" action="{{route('movie.update', $movie->id)}}" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                <input type="hidden" name="id" value="{{$movie->id}}">

                <!-- LEFT -->
                <div style="float:left; width: 28%; height: ‭432‬px;"> 
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Título</label>
                        <input style="width: 100%" type="text" class="form-control" name="title" placeholder="Título" value="{{$movie->title}}" required>
                    </div>
                    <div class="form-group">
                        <label>Año de salida</label>
                        <input style="width: 100%" type="number" class="form-control" name="year" placeholder="Año de salida" value="{{$movie->year}}" required>
                    </div>
                    <div class="form-group">
                        <label>Duración</label>
                        <input style="width: 100%" type="number" class="form-control" name="duration" placeholder="Duración (Minutos)" value="{{$movie->duration}}" required>
                    </div>
                    <div class="form-group">
                        <label>Valoración</label> <br>
                        <input id="slider" style="width: 95%" type="range" class="custom-range" min="0" max="10" step="0.1" name="rating" value="{{$movie->rating}}">
                        <br><span style="position: relative; top: -5px;" id="sliderValue"><b>{{$movie->rating}}</b></span>
                        <script>
                        $(document).ready(function(){
                            $("#slider").change(function() {
                                document.getElementById("sliderValue").innerHTML = "<b>"+document.getElementById("slider").value+"<b>";
                            });
                        });
                        </script>
                    </div>
                    <div class="form-group">
                        <label>URL Externa</label>
                        <input style="width: 100%" type="text" class="form-control" name="external_url" placeholder="URL externa" value="{{$movie->external_url}}" required>
                    </div>
                    <div class="form-group">
                        <label>Portada</label>
                        <input type="file" name="cover" accept="image/png, image/jpeg">
                        <!-- <input style="width: 100%" type="text" class="form-control" name="cover" placeholder="Portada" value="{{$movie->cover}}" required> -->
                    </div>
                    <div class="form-group">
                        <label>Nombre del archivo</label>
                        <input style="width: 100%" type="text" class="form-control" name="filename" placeholder="Nombre" value="{{$movie->filename}}" required>
                    </div>
                    <br>
                </div> <!-- END LEFT -->
                
                <!-- RIGHT -->
                <div style="float: right; width: 37%; height: 530px;" > 
                    <div class="form-group">
                        <label>Géneros</label>
                        <select multiple class="form-control" style="width: 90%; height: 100px" name="genres[]">
                            @foreach ($genres as $genre)
                                <option
                                @foreach ($movie->genres as $filmGenre)
                                    @if ($filmGenre->description == $genre->description)
                                        selected 
                                    @endif
                                @endforeach
                                value="{{$genre->id}}">{{$genre->description}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Directores</label>
                        <select multiple class="form-control" style="width: 90%; height: 100px" name="directors[]">
                            @foreach ($people as $person)
                                <option
                                @foreach ($movie->directors as $filmDirector)
                                    @if ($filmDirector->name == $person->name)
                                        selected 
                                    @endif
                                @endforeach
                                value="{{$person->id}}">{{$person->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group"> 
                        <label>Actores</label>
                        <select multiple class="form-control" style="width: 90%; height: 100px" name="actors[]">
                            @foreach ($people as $person)
                                <option
                                @foreach ($movie->actors as $filmActor)
                                    @if ($filmActor->name == $person->name)
                                        selected 
                                    @endif
                                @endforeach
                                value="{{$person->id}}">{{$person->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br><br><br>
                    <div style="width: 100%; text-align: center">
                        <br>
                        <button type="submit">MODIFICAR PELÍCULA</button>
                    </div>
                    

                </div> <!-- END RIGHT -->
                
                <input type="hidden" name="filepath" placeholder="FilePath" value="{{$movie->filepath}}" required><br>
            </form>
        </div>
@endsection