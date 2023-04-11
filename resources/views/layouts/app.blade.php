<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gwap - @yield('titulo')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>

    <div class="nav">
        <h1>
            {{auth()->user()->nombre}}
        </h1>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit">Salir</button>            
        </form>
    </div>
    @yield('contenido')
</body>
</html>