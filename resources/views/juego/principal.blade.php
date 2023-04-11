@extends('layouts.app')
@section('Titulo','Partidas')
@section('contenido')

    <div class="jugar">
        <a href="{{route('CrearJuego')}}"><h2>Crear partida nueva</h2></a>
    </div>
    @foreach ($partidas as $partida )
        @if ($partida->jugador3==0)
            <div>
                <h2>Partida - {{ $partida->id }}</h2> 
                <a href="{{ route('partida',$partida)}}">Unirme</a>
            </div>
            
        @endif
        
    @endforeach

@endsection
