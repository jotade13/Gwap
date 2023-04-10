@extends('layouts.guest')
@section('Titulo','Partidas')
@section('contenido')
    <h2>
        Partida - {{ $partida->id }}
    </h2>
    @if ($partida->jugador1!=0 && $partida->jugador2!=0 && $partida->jugador3!=0)
        <h1>Espacio para imagen</h1>
        <input type="text">
    @else
        <h1>Cargando.....</h1>        
    @endif
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">Salir</button>            
    </form>
    {{-- <input type="button" value="enviar" onclick="recarga()">
    <div id="mostrarMensaje"></div>
   <script>

        function recarga()
        {
            
            $.ajax({
                url: "Enviar.php",
                type: "POST", 
                success: function (mensaje) {
                    $('#mostrarMensaje').html(mensaje);
                },
            })

        }

    </script>
     --}}
@endsection