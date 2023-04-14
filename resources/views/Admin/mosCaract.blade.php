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
{{-- 
        <div class="col-span-3 grid grid-rows-3 gap-1 h-">
            
            <div class="grid grid-cols-3 mt-1 gap-0.5 h-full overflow-auto">
                

            </div>
            <div class="grid grid-cols-3 mt-1 gap-0.5 h-full overflow-auto">
                <div class="bg-blue-900">
                    @foreach ($carac as $caracteristica)
                        @if ($caracteristica->id_imagen == $partida['imagen1']->id && $caracteristica->id_usuario == $partida['jugador1']->id)                
                            <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                        @endif
                    @endforeach
                </div>
                <div class="bg-blue-900">
                    @foreach ($carac as $caracteristica)
                        @if ($caracteristica->id_imagen == $partida['imagen2']->id && $caracteristica->id_usuario == $partida['jugador2']->id)                
                            <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                        @endif
                    @endforeach
                </div>
                <div class="bg-blue-900">
                    @foreach ($carac as $caracteristica)
                        @if ($caracteristica->id_imagen == $partida['imagen3']->id && $caracteristica->id_usuario == $partida['jugador3']->id)                
                            <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                        @endif
                    @endforeach
                </div>

            </div>
            <div class="grid grid-cols-3 mt-1 gap-0.5 h-full overflow-auto">
                <div class="bg-blue-900">
                    @foreach ($carac as $caracteristica)
                        @if ($caracteristica->id_imagen == $partida['imagen1']->id && $caracteristica->id_usuario == $partida['jugador1']->id)                
                            <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                        @endif
                    @endforeach
                </div>
                <div class="bg-blue-900">
                    @foreach ($carac as $caracteristica)
                        @if ($caracteristica->id_imagen == $partida['imagen2']->id && $caracteristica->id_usuario == $partida['jugador2']->id)                
                            <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                        @endif
                    @endforeach
                </div>
                <div class="bg-blue-900">
                    @foreach ($carac as $caracteristica)
                        @if ($caracteristica->id_imagen == $partida['imagen3']->id && $caracteristica->id_usuario == $partida['jugador3']->id)                
                            <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
                        @endif
                    @endforeach
                </div>

            </div>
            
            
        </div> --}}
        
       {{-- <div class="grid grid-cols-2 mr-2">
            <div class="">
                <h1 class="h-6 text-white text-center">Partida</h1>
                @foreach ($partidas as $partida)
                    <div class=" border-2 h-20 border-r-0 hover:border-blue-950 hover:border-r-2  ">
                        <a href="{{ route('admin.mostrarCaracteriticas',$partida['id']) }}" class="h-full w-full my-auto text-white flex flex-col items-center justify-center hover:bg-blue-900"><p>{{$partida['id']}}</p></a>
                    </div>
                
                @endforeach
            </div>
            <div class="h-6">                
                <h1 class="h-6 text-white text-center">Jugadores</h1>
                @foreach ($partidas as $partida)
                    <div class=" border-2 h-20 border-l-0">
                        <div>
                            <p class="text-white text-center">{{$partida['jugador1']}}</p>
                            <p class="text-white text-center">{{$partida['jugador2']}}</p>
                            <p class="text-white text-center">{{$partida['jugador3']}}</p>
                        </div>
                    </div>                
                @endforeach
            </div>
        </div>
        
        <div class="ml-3 mb-2 col-span-2 flex flex-col items-center justify-center ">

            <form action="{{route('admin.subirImagen')}}" method="post" enctype="multipart/form-data">
                @csrf
                @error('imagen')
                <small>{{$message}}</small>
                <br>
                @enderror
                <div>
                    <input class="p-1 " type="file" name="imagen">
                </div>
                <button type="submit" class="mb-4 pl-2 w-40 text-white border-2 border-slate-800 hover:border-slate-400 hover:bg-slate-700 rounded-lg">Subir Imagen</button>
            </form>
        </div>--}}
    </div> 
@endsection