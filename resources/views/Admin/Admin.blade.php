@extends('layouts.app')
@section('titulo','Admin')
@section('contenido')

    <div class="grid grid-cols-3 gap-2 h-screen ">
        <div class="col-span-2 ">
            <h1 class="text-3xl text-center text-white py-2">Imagenes</h1>
        </div>
        <div>
            <h1 class="text-3xl text-center text-white py-2">Partidas</h1>
        </div>
        <div class="col-span-2 h-screen ">
            <div class=" h-full overflow-y-auto overflow-x-hidden">
                @foreach ($fotos as $foto)
                    <img class="mt-3 ml-3 mb-1 pr-6" src="storage/imagenes/{{$foto->nombre}}" alt="{{$foto->id}}">    
                @endforeach
            </div>
        </div>
        <div class="grid grid-cols-2 mr-2">
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
        </div>
    </div>
@endsection