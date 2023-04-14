<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gwap - @yield('titulo')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gradient-to-r from-sky-700 to-indigo-800 ">

    <div class="flex flex-wrap justify-between bg-slate-800 p-2">
        <div class="ml-2 px-2 w-24 text-white border-2 border-slate-800 hover:border-slate-400 hover:bg-slate-700 rounded-lg">
            <form action="{{route('principal')}}" method="post">
                @csrf
                <button class="w-full p-1 text-white" type="submit">Principal</button>            
            </form>
        </div>
        <div class="py-1">
            <h1 class="text-white text-xl uppercase">{{auth()->user()->nombre}}</h1>
        </div>
        <div class="mr-2 px-2 w-20 text-white border-2 border-slate-800 hover:border-slate-400 hover:bg-slate-700 rounded-lg">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button class="w-full p-1 text-white" type="submit">Salir</button>            
            </form>
        </div>
    </div>

    @yield('contenido')
</body>
</html>