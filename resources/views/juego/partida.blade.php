@extends('layouts.app')
@section('Titulo','Partidas')
@section('contenido')
    
    <div id="mostrarMensaje"></div>
    <input type="button" value="recargar" onclick="recarga()">

    <script>
        function recarga()
        {            
            $.ajax({
                url: "{{ route('recargar') }}",
                type: "get", 
                
                success: function (mensaje) {
                    $('#mostrarMensaje').html(mensaje);
                }
            });
        }
        // setInterval("recargar()",1000);
        
    </script>

@endsection