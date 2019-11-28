@extends('../layouts/master')

@section('title', 'Indice de usuarios')

@section('innerTitle')
    Índice de usuarios
@endsection
@section('titleButton')
    Iniciar sesión
@endsection


@section('sidebar')
    En este menu podemos ver la información de todos los usuarios
@endsection

@section('content')
    <table class="table">
        <thead class="text-light bg-success">
        <tr>
            <th>ID</th>
            <th>Nick</th>
            <th>Email</th>
            <th>Password</th>
            <th>Type</th>
            <th style="font-weight: normal;"><a href="{{route('user.create')}}"> <Button> Registrar </Button> </a></th>
        </tr>
        </thead>
        
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->nick}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->type}}</td>
                <td><a href="{{route('user.show', $user->id)}}"> <button> Perfil </button> </a></td>
                <td><a href="{{route('user.edit', $user->id)}}"> <Button> Modificar </Button> </a></td>
                <td>
                    <form method="POST" action="{{route('user.destroy', $user->id)}}">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Eliminar"> 
                    </form>
                </td>
            </tr>
        @endforeach
        <tbody>
    </table>
@endsection