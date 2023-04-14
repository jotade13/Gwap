@extends('layouts.guest')
@section('titulo','buscador')
@section('contenido')
    <div class=" ml-28 mt-24 px-2 w-32 text-white border-2 border-slate-800 hover:border-slate-400 hover:bg-slate-700 rounded-lg">
        <a class=" w-full p-2 text-white" href="{{route('login')}}">Ingresar</a>
    </div>
    <div class=" rounded h-screen  mt-1 ml-28 bg-slate-900 w-96 grid grid-cols-3">
        <div class="h-10 mt-2 mx-2 col-span-2">
            <input class="w-full text-gray-200 pb-1 bg-slate-900 border-b-2 border-gray-500" type="text" id="input-busqueda">
        </div>
        <div class="mr-2 mt-1 px-2 w-28 h-10 text-white border-2 border-slate-800 hover:border-slate-400 hover:bg-slate-700 rounded-lg">
            <button class=" w-full p-2 text-white" onclick="buscar()">Buscar</button>
        </div>
        
        <div class="h-full overflow-y-auto overflow-x-hidden col-span-3" id="imagenes"></div>
    </div>

    <script>
        function buscar()
        {
            var busqueda = $("#input-busqueda").val();
            if(busqueda!="")
            {
                var parametros = 
                {           
                    "busqueda" : busqueda
                };         
                $.ajax({
                    
                    data: parametros,
                    url: "{{route('buscar')}}",
                    type: "get",

                    success: function (busque) {
                        $('#imagenes').html(busque);
                        $('#input-busqueda').val('');
                    }
                });
            }
        }
    </script>
@endsection