@extends('../layouts/master')

@section('title', 'Crear nuevo usuario')

@section('innerTitle')
    Creando nuevo usuario
@endsection

@section('sidebar')
    <p>En este menu podemos ver un formulario para crear nuestros usuarios</p>
@endsection

@section('content')

<form method="POST" action="{{route('user.store')}}">
        @csrf 
        <input type="text" name="nick" placeholder="Nick"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="checkbox" name="type" value="true"> is admin? <br><br>
        <button type="submit">Create User</button>
    </form>
    <a href="{{route('user.index')}}"> Retroceder </a>
@endsection