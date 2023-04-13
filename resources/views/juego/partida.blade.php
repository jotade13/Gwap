@extends('layouts.app')
@section('Titulo','Partidas')
@section('contenido')

    <div class="grid grid-cols-3 gap-3 sm:gap-6 m-4 h-screen">        
        <div class="bg-blue-400 col-span-2 rounded h-3/4 " id="juego"></div>
        <div class="bg-blue-400 rounded h-3/4"> 
            <h1 class="text-3xl text-center" >Puntaje</h1>
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