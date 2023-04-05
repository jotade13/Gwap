@extends('layouts.guest')
@section('Titulo','Partidas')
@section('contenido')

    @if ($band)
        @foreach ($partidas as $partida )
            @if ($partida->jugador3==0)
                <div>
                    <h2>Partida - {{ $partida->id }}</h2> 
                    <a href="{{ route('AgregarJugador',$partida)}}">Unirme</a>
                </div>
                
            @endif
            
        @endforeach
        <div class="jugar">
            <a href="{{route('CrearJuego')}}"><h2>Crear partida nueva</h2></a>
        </div>
    @else
        <div>
            <h2>Partida - {{ $partidas->id }}</h2> 
            <a href="{{ route('AgregarJugador',$partidas)}}">volver</a>
        </div>
        
    @endif
    
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">Salir</button>            
    </form>
@endsection
