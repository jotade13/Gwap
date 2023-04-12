<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gwap - @yield('titulo')</title>
    @vite(['resources/css/app.css'])
</head>
<body style="background-image: url(img/fondoL.JPG)" class="h-screen w-full bg-cover bg-no-repeat">
        @yield('contenido')
    
</body>

</html>