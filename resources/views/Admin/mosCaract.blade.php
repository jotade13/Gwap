@extends('layouts.app')
@section('titulo','Admin')
@section('contenido')

    <div class="grid grid-cols-5 gap-2 mb-4">
        <div class="col-span-2 h-14">
            <h1 class="text-3xl text-center text-white py-2">Imagenes</h1>
        </div>
        <div class="h-14">
            <h1 class="text-3xl text-center text-white py-2">{{ $partida['jugador1']->nombre }}</h1>
        </div>
       <div class="h-14">
            <h1 class="text-3xl text-center text-white py-2">{{ $partida['jugador2']->usuario }}</h1>
        </div>
        <div class="h-14">
            <h1 class="text-3xl text-center text-white py-2">{{ $partida['jugador3']->usuario }}</h1>
        </div>

        <div class="col-span-2 ">
            <div class="mt-1 mb-3">
                <img class=" ml-3 mb-1 pr-6" src="../storage/imagenes/{{$partida['imagen1']->nombre}}" alt="{{$partida['imagen1']->id}}">    
            </div>
        </div>
        <div class="bg-blue-900  h-32 sm:h-40 md:h-52 lg:h-64 xl:h-80 overflow-auto">
            @foreach ($carac as $caracteristica)
                @if ($caracteristica->id_imagen == $partida['imagen1']->id && $caracteristica->id_usuario == $partida['jugador1']->id)                
                    <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                @endif
            @endforeach
        </div>
        <div class="bg-blue-900  h-32 sm:h-40 md:h-52 lg:h-64 xl:h-80 overflow-auto">
            @foreach ($carac as $caracteristica)
                @if ($caracteristica->id_imagen == $partida['imagen1']->id && $caracteristica->id_usuario == $partida['jugador2']->id)                
                    <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                @endif
            @endforeach
        </div>
        <div class="bg-blue-900  h-32 sm:h-40 md:h-52 lg:h-64 xl:h-80 overflow-auto">
            @foreach ($carac as $caracteristica)
                @if ($caracteristica->id_imagen == $partida['imagen1']->id && $caracteristica->id_usuario == $partida['jugador3']->id)                
                    <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                @endif
            @endforeach
        </div>
        <div class="col-span-2  ">
            <div class="mb-3">
                <img class=" ml-3 mb-1 pr-6" src="../storage/imagenes/{{$partida['imagen2']->nombre}}" alt="{{$partida['imagen2']->id}}">    
            </div>
        </div>
        <div class="bg-blue-900 h-32 sm:h-40 md:h-52 lg:h-64 xl:h-80 overflow-auto">
            @foreach ($carac as $caracteristica)
                @if ($caracteristica->id_imagen == $partida['imagen2']->id && $caracteristica->id_usuario == $partida['jugador1']->id)                
                    <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                @endif
            @endforeach
        </div>
        <div class="bg-blue-900 h-32 sm:h-40 md:h-52 lg:h-64 xl:h-80 overflow-auto">
            @foreach ($carac as $caracteristica)
                @if ($caracteristica->id_imagen == $partida['imagen2']->id && $caracteristica->id_usuario == $partida['jugador2']->id)                
                    <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                @endif
            @endforeach
        </div>
        <div class="bg-blue-900 h-32 sm:h-40 md:h-52 lg:h-64 xl:h-80 overflow-auto">
            @foreach ($carac as $caracteristica)
                @if ($caracteristica->id_imagen == $partida['imagen2']->id && $caracteristica->id_usuario == $partida['jugador3']->id)                
                    <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                @endif
            @endforeach
        </div>
        <div class="col-span-2  ">
            <div class="mb-3">
                <img class=" ml-3 mb-1 pr-6" src="../storage/imagenes/{{$partida['imagen3']->nombre}}" alt="{{$partida['imagen3']->id}}">    
            </div>
        </div>
        <div class="bg-blue-900 h-32 sm:h-40 md:h-52 lg:h-64 xl:h-80 overflow-auto">
            @foreach ($carac as $caracteristica)
                @if ($caracteristica->id_imagen == $partida['imagen3']->id && $caracteristica->id_usuario == $partida['jugador1']->id)                
                    <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                @endif
            @endforeach
        </div>
        <div class="bg-blue-900 h-32 sm:h-40 md:h-52 lg:h-64 xl:h-80 overflow-auto">
            @foreach ($carac as $caracteristica)
                @if ($caracteristica->id_imagen == $partida['imagen3']->id && $caracteristica->id_usuario == $partida['jugador2']->id)                
                    <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                @endif
            @endforeach
        </div>
        <div class="bg-blue-900 h-32 sm:h-40 md:h-52 lg:h-64 xl:h-80 overflow-auto">
            @foreach ($carac as $caracteristica)
                @if ($caracteristica->id_imagen == $partida['imagen3']->id && $caracteristica->id_usuario == $partida['jugador3']->id)                
                    <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                @endif
            @endforeach
        </div>
    </div> 
@endsection