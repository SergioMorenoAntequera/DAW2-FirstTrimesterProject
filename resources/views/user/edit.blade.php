@extends('../layouts/master')

@section('title', 'Modificar usuario')

@section('innerTitle')
    Modificando usuario: {{$user->nick}}
@endsection

@section('sidebar')
    <p>En este menu podemos ver un formulario para modificar un usuario</p>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header border border-success"> Modificar usuario </div>
            <div class="card-body">
                <form method="POST" action="{{route('user.update', $user->id)}}">
                    @csrf
                    @method("PATCH")

                    <div class="form-group row">
                        <label for="nick" class="col-md-4 col-form-label text-md-right"> 
                            Nick 
                        </label>
                        <div class="col-md-6">
                            <input id="nick" type="text" class="form-control @error('nick') is-invalid @enderror" name="nick" value="{{$user->nick}}" required autocomplete="nick" autofocus>
                            @error('nick')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                            @enderror
                           </div>
                    </div>
               
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">
                            Dirección de E-Mail
                        </label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">
                            Contraseña
                        </label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{$user->password}}" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit">Modify User</button>
                </form>
            </div>
        </div>
    </div>
</div>

    

@endsection