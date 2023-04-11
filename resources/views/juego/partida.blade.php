@extends('layouts.app')
@section('Titulo','Partidas')
@section('contenido')
    
    <div id="mostrarMensaje"></div>
    {{-- <input type="button" value="recargar" onclick="recarga()"> --}}

    <script>
        function comprobar_jugadores_en_la_partida()
        {               
            $.ajax({     //comprueba si ya estan todos los jugadores para iniciar la partida
                url: "{{ route('comprobar')}}",
                type: "get", 
                
                success: function (mensaje) {
                    $('#mostrarMensaje').html(mensaje);
                }
            });
        }
        var comprobar = setInterval("comprobar_jugadores_en_la_partida()",1000); 
        
    </script>

@endsection