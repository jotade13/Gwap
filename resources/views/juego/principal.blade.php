@extends('layouts.app')
@section('Titulo','Partidas')
@section('contenido')

    
    <div class="flex justify-between items-start">
        <div class=" bg-slate-800 rounded-lg pt-2 m-2 flex-1">
            <h1 class="text-3xl text-white text-center pb-2" >Estadistica</h1>
            <h1>Estadistica</h1>
            <h1>Estadistica</h1>
            <h1>Estadistica</h1>
        </div>
        <div class="bg-slate-800 rounded-lg pt-2 m-2 flex-1">
            <h1 class="text-3xl text-white text-center pb-2">Calificación</h1>
        </div>
        <div class="bg-slate-800 rounded-lg pt-2 m-2 flex-1">
            <h1 class="text-3xl text-white text-center pb-2" >Partidas</h1>
            <div class="jugar">
                <a href="{{route('CrearJuego')}}"><h2>Crear partida nueva</h2></a>
            </div>
            @foreach ($partidas as $partida )
                @if ($partida->jugador3==0)
                    <div class="flex">
                        <h2>Partida - {{ $partida->id }}</h2> 
                        <a href="{{ route('partida',$partida)}}">Unirme</a>
                    </div>
                    
                @endif
                
            @endforeach
        </div>
        
    </div>
    

@endsection
