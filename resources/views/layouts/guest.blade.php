<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gwap - @yield('titulo')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @vite(['resources/css/app.css'])
</head>
<body style="background-image: url(img/fondoL.JPG)" class="h-screen w-full bg-cover bg-no-repeat">
        @yield('contenido')
    
</body>

</html>