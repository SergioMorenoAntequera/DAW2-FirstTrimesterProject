@extends('../layouts/master')

@section('title', 'Modificar Genero')

@section('sidebar')
    <p>Modificando género: {{$genre->description}}</p>
@endsection

@section('content')

<div class="card text-center">
        <div class="card-header border border-success">
            Modificar género existente
        </div>
        
        <div class="card-body">
            <form method="POST" action="{{route('genre.update', $genre->id)}}">
                @csrf
                @method("PATCH")
                <input type="hidden" name="id" value="{{$genre->id}}">
                
                <!-- Nombre -->
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">
                        Nombre / Descripción
                    </label>
                    <div class="col-md-6">
                        <input name="description" id="name" type="text" class="form-control" value="{{$genre->description}}" required autofocus>
                    </div>
                </div>

                <!-- Detalles -->
                <div class="form-group row">
                    <label for="details" class="col-md-4 col-form-label text-md-right">
                        Detalles
                    </label>
                    <div class="col-md-6">
                        <textarea name="details" id="details" type="text" class="form-control" rows="6" required autofocus>{{$genre->details}}</textarea>
                    </div>
                </div>

                <!-- Boton para modificar -->
                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">
                            Modificar género
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection