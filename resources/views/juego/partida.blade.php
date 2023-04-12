@extends('layouts.app')
@section('Titulo','Partidas')
@section('contenido')
    
    <div id="juego"></div>
    {{-- <input type="button" value="recargar" onclick="recarga()"> --}}

    <script>
        function comprobar_jugadores_en_la_partida()
        {               
            $.ajax({     //comprueba si ya estan todos los jugadores para iniciar la partida
                url: "{{ route('comprobar',['partida'=>$partida])}}",
                type: "get", 
                
                success: function (juego) {
                    $('#juego').html(juego);
                }
            });
        }
        var comprobar = setInterval("comprobar_jugadores_en_la_partida()",1000); 
        
    </script>

@endsection