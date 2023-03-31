<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gwap - @yield('titulo')</title>
</head>
<body>
    <header>
        <div class="jugar">
            <a href="{{route('juego')}}"><h2>jugar</h2></a>
        </div>
        <div class="nav">
            <h3>nombre</h3>
            <h3>salir</h3>
        </div>
    </header>
    @yield('contenido')
</body>
</html>