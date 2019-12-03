@extends('../layouts/master')

@section('title', 'Crear nueva película')

@section('innerTitle')
    Creando nueva película
@endsection

@section('sidebar')
    <p>Creando nueva película</p>
@endsection

@section('content')

<div style="float:left; margin-right: 15px; text-align: left">
        
    <img style="margin-left: 0px" src="/img/covers/NoCover.png" width="355px" height="460px">
</div>

<div class="text-left"> 
    <h4><b>Creación de película</b></h4>
    <form style="display: inline" method="POST" action="{{route('movie.store')}}" enctype="multipart/form-data">
        @csrf
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
                <input style="width: 100%" type="text" class="form-control" name="title" placeholder="Título" required>
            </div>
            <div class="form-group">
                <label>Año de salida</label>
                <input style="width: 100%" type="number" class="form-control" name="year" placeholder="Año de salida" required>
            </div>
            <div class="form-group">    
                <label>Duración</label>
                <input style="width: 100%" type="number" class="form-control" name="duration" placeholder="Duración (Minutos)" required>
            </div>
            <div class="form-group">
                <label>Valoración</label> <br>
                <input id="slider" style="width: 95%" type="range" class="custom-range" name="rating" min="0" max="10" step="0.1" value="5">
                <br><span style="position: relative; top: -5px;" id="sliderValue"><b>5</b></span>
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
                <input style="width: 100%" type="text" class="form-control" name="external_url" placeholder="URL externa" value="{{Request::old('external_url')}}">
            </div>
            <div class="form-group">
                <label>Portada</label>
                <input type="file" name="cover" accept="image/png, image/jpeg">
                <!-- <input style="width: 100%" type="text" class="form-control" name="cover" placeholder="Portada" required> -->
            </div>
            <div class="form-group">
                <label>Nombre del archivo</label>
                <input style="width: 100%" type="text" class="form-control" name="filename" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <input style="width: 100%" type="hidden" value="movies" class="form-control" name="filepath" placeholder="Filepath" required>
            </div>
            <br>
        </div>
        <!-- END LEFT -->
        
        <!-- RIGHT -->
        <div style="float: right; width: 37%; height: 530px;" > 
            <div class="form-group">
                <label>Géneros</label>
                <select multiple class="form-control" style="width: 90%; height: 100px" name="genres[]">
                    @foreach ($genres as $genre)
                        <option value="{{$genre->id}}"> {{$genre->description}} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Directores</label>
                <select multiple class="form-control" style="width: 90%; height: 100px" name="directors[]">
                    @foreach ($people as $person)
                        <option value="{{$person->id}}"> {{$person->name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group"> 
                <label>Actores</label>
                <select multiple class="form-control" style="width: 90%; height: 100px" name="actors[]">
                    @foreach ($people as $person)
                        <option value="{{$person->id}}"> {{$person->name}} </option>
                    @endforeach
                </select>
            </div>
            <br><br><br>
            <div style="width: 100%; text-align: center">
                <br>
                <button type="submit"> Crear película </button>
            </div>
        </div> 
        <!-- END RIGHT -->
    </form>
</div>

@endsection