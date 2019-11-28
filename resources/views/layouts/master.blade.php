<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/myStyle.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/tables.css') }}"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="/js/jquery-3.4.1.js"></script>
  </head>
  <body class="bg-light">
    
    <!-- Inicio del header-->
    <div style="height: 80px">
    <header>
        <nav style="height: 80px" class="navbar navbar-expand-md navbar-dark bg-success">

            <a class="navbar-brand" href="{{route('movie.index')}}"><strong>
            Hollywood 2
            </strong></a>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="{{route('movie.index')}}"> Peliculas </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('person.index')}}"> Personas </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('genre.index')}}"> Generos </a>
                </li>
                @auth
                    <li style="position: absolute; top: 15px; right: 10px" class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link"> 
                            <button type="submit" class="btn btn-success">
                                Cerrar Sesión 
                            </button>
                            </a>
                        </form>
                    </li>    
                @endauth
                @guest
                    <li style="position: absolute; top: 15px; right: 10px" class="nav-item">
                        <form method="GET" action="{{ route('login') }}">
                            @csrf
                            <a class="nav-link"> 
                            <button type="submit" class="btn btn-success">
                                Log In
                            </button>
                            </a>
                        </form>
                    </li>
                @endguest
            </ul>
            </div>
        </nav>
    </header>
    </div>
    <!-- Fin del header-->

    <!-- Comiezo del resto de página -->
    <div class="bg-light text-center">

        <br>
        <div class="container">
            <h2 class="text-left"><b>
            @section('sidebar')
                master.blade.php -> section.sidebar
            @show
            </b></h2>        
        </div>
        
        <br>
        <div class="container">
            @yield('content')    
        </div>
    </div>
    <!-- fin del resto de página -->

    <div style="height: 90px;">
        
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>