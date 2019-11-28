@extends('../layouts/master')

@section('title', 'Perfil de usuariob ')

@section('innerTitle')
    Perfil del usuario: {{$user['nick']}}
@endsection

@section('sidebar')
    En este menu tenemos la información de un usuario
@endsection

@section('content')
    <p><b>Información del usuario</b></p>

    <table id="mainTable">
            <tr>
                <th>ID</th>
                <th>Nick</th>
                <th>Email</th>
                <th>Password</th>
                <th>Type</th>
            </tr>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->nick}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->type}}</td>
                <td><a href="{{route('user.edit', $user->id)}}"> <button> Editar </button></a></td>
                <!-- Botón de borrar -->
                <td><br><form method="POST" action="{{route('user.destroy', $user->id)}}">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Eliminar"> 
                </form></td>
            </tr>
        </table>
        <br><br>
@endsection