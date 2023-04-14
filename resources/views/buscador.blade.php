@extends('layouts.guest')
@section('titulo','buscador')
@section('contenido')
    <br>
    <br>
    <input type="text" id="input-busqueda">
    <button onclick="buscar()">Buscar</button>
    <div id="imagenes"></div>

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