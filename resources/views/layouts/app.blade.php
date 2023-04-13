<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gwap - @yield('titulo')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gradient-to-r from-sky-700 to-indigo-800 ">

    <div class="flex flex-wrap justify-between bg-slate-800 rounded-lg p-2">
        <div class="pl-4">
            <h1 class="text-white text-xl uppercase">{{auth()->user()->nombre}}</h1>
        </div>
        <div class="mr-1 bg-black rounded-lg px-2  ">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button class="w-full ml-auto my-0.5  py-1 text-white" type="submit">Salir</button>            
            </form>
        </div>
    </div>

    @yield('contenido')
</body>
</html>