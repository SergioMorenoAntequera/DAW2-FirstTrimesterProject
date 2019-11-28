@extends('../layouts/master')

@section('title', 'Modificar usuario')

@section('innerTitle')
    Modificando usuario: {{$user->nick}}
@endsection

@section('sidebar')
    <p>En este menu podemos ver un formulario para modificar un usuario</p>
@endsection

@section('content')

    <form method="POST" action="{{route('user.update', $user->id)}}">
        @csrf
        @method("PATCH")

        <input type="text" name="nick" placeholder="Nick" value="{{$user->nick}}"><br>
        <input type="email" name="email" placeholder="Email" value="{{$user->email}}"><br>
        <input type="password" name="password" placeholder="Password" value="{{$user->password}}"><br>
        @if ($user->type == 0)
            <input type="checkbox" name="type" value="true" checked=> is admin? <br><br> 
        @else
            <input type="checkbox" name="type" value="true"> is admin? <br><br>
        @endif

        <button type="submit">Modify User</button>
    </form>

@endsection