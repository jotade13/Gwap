@extends('layouts.app')
@section('titulo','Admin')
@section('contenido')

   
    @foreach ($fotos as $foto)
    <img src="images/{{$foto->nombre}}" alt="{{$foto->id}}">    
    @endforeach
    @foreach ($partidas as $partida)
    <p>{{$partida->id}}</p>
    <p>{{$partida->jugador1}}</p>
    <p>{{$partida->jugador2}}</p>
    <p>{{$partida->jugador3}}</p>
    @endforeach
    
    <form action="{{route('admin.subirImagen')}}" method="post" enctype="multipart/form-data">
        @csrf
        @error('imagen')
            <small>{{$message}}</small>
            <br>
        @enderror
        <input type="file" name="imagen">
	    <button type="submit">Subir Imagen</button>
    </form>
@endsection