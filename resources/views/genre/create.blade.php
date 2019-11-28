@extends('../layouts/master')

@section('title', 'Crear nuevo usuario')

@section('sidebar')
    <p>Creación de nuevo género</p>
@endsection

@section('content')
    <div class="card text-center">
        <div class="card-header border border-success">
            Ingreso de nuevo género
        </div>
        
        <div class="card-body">
            <form method="POST" action="{{ route('genre.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">
                        Nombre / Descripción
                    </label>
                    <div class="col-md-6">
                        <input name="description" id="name" type="text" class="form-control" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="details" class="col-md-4 col-form-label text-md-right">
                        Detalles
                    </label>
                    <div class="col-md-6">
                        <textarea name="details" id="details" type="text" class="form-control" rows="6" required autofocus></textarea>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">
                            Registrar género
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection