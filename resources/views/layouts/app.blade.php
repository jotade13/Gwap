<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gwap - @yield('titulo')</title>
</head>
<body>
    <header>
        @role('jugador')
        <div class="Iniciar">
            <a href="{{route('VerPartidas')}}"><h2>Iniciar</h2></a>
        </div>
        @endrole
        <div class="nav">
            <h3>nombre</h3>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit">Salir</button>            
            </form>
        </div>
    </header>
    @yield('contenido')
   
</body>
</html>