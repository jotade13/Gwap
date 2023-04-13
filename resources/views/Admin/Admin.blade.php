@extends('layouts.app')
@section('titulo','Admin')
@section('contenido')

    <div class="grid grid-cols-3 ">
        <div>
            @foreach ($fotos as $foto)
                <img src="storage/imagenes/{{$foto->nombre}}" alt="{{$foto->id}}">    
            @endforeach
        </div>
        <div class="">
            @foreach ($partidas as $partida)
                <div class="flex">
                    <p>{{$partida->id}}</p>
                    <p>{{$partida->jugador1}}</p>
                    <p>{{$partida->jugador2}}</p>
                    <p>{{$partida->jugador3}}</p>
                </div>
                
            @endforeach
        </div>
        
        
        <form action="{{route('admin.subirImagen')}}" method="post" enctype="multipart/form-data">
            @csrf
            @error('imagen')
                <small>{{$message}}</small>
            <br>
            @enderror
            <input type="file" name="imagen">
            <button type="submit">Subir Imagen</button>
        </form>
    </div>
@endsection