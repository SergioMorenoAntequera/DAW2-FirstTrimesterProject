@extends('../layouts/master')

@section('title', 'Introducir nueva moviea')

@section('innerTitle')
    Creando nueva moviea
@endsection

@section('sidebar')
    <p>Creando nueva persona</p>
@endsection

@section('content')

<div style="float:left; margin-right: 15px; text-align: left">
    <!-- Imagen vacía para la vista -->
    <img style="margin-left: 0px" src="/img/people/NoPhoto.png" width="355px" height="460px">
    <br>
</div>

<!-- Panel de la derecha donde irán los cambios -->
<div class="text-left"> 
    <h4><b>Creación de persona</b></h4>
    <form style="display: inline" method="POST" action="{{route('person.store')}}" enctype="multipart/form-data">
        @csrf
        <!-- LEFT -->
        <div style="float:left; width: 28%; height: ‭432‬px;"> 
            <div class="form-group">
                <label>Nombre</label>
                <input style="width: 100%" type="text" class="form-control" name="name" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label>URL Externa</label>
                <input style="width: 100%" type="text" class="form-control" name="external_url" placeholder="URL Externa">
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
                <label>Películas dirigidas</label>
                <select multiple class="form-control" style="width: 90%; height: 100px" name="moviesDirected[]">
                    @foreach ($movies as $movie)
                        <option value="{{$movie->id}}">{{$movie->title}} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Películas actuadas</label>
                <select multiple class="form-control" style="width: 90%; height: 100px" name="moviesActed[]">
                    @foreach ($movies as $movie)
                        <option value="{{$movie->id}}">{{$movie->title}} </option>
                    @endforeach
                </select>
            </div>
            <br><br><br>
            <div style="width: 100%; text-align: center">
                <br>
                <button type="submit"> CREAR PERSONA </button>
            </div>
        </div> 
        <!-- END RIGHT -->
    </form>
</div>

@endsection