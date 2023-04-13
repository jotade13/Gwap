@extends('layouts.app')
@section('Titulo','Partidas')
@section('contenido')

    <div class="grid grid-cols-3 gap-3 sm:gap-6 m-4 ">        
        <div class="bg-blue-400 col-span-2 rounded h-96  flex items-center justify-center " id="juego"></div>
        <div> <h1 class="bg-blue-400 text-3xl text-center rounded h-96">Puntaje</h1>
            <div id="puntaje"></div>
        </div>
    </div>  

    <script type="text/javascript">

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
        function actualizar_puntaje()
        {
            $.ajax({    
                url: "{{ route('puntaje',['partida'=>$partida])}}",
                type: "get", 
                
                success: function (puntaje) {
                    $('#puntaje').html(puntaje);
                }
            });
        }
        var actualizarPuntaje = setInterval("actualizar_puntaje()",1000)
        var comprobar = setInterval("comprobar_jugadores_en_la_partida()",1000);   
    </script>

@endsection