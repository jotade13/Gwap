@extends('layouts.app')
@section('Titulo','Partidas')
@section('contenido')
    
    <div id="mostrarMensaje"></div>
    {{-- <input type="button" value="recargar" onclick="recarga()"> --}}

    <script>
        function recarga()
        {               
            $.ajax({     //comprueba si ya estan todos los jugadores para iniciar la partida
                url: "{{ route('recargar') }}",
                type: "get", 
                
                success: function (mensaje) {
                    $('#mostrarMensaje').html(mensaje);
                }
            });
        }
        var comprobar = setInterval("recarga()",1000); 
        
    </script>

@endsection