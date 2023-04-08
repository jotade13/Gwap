@extends('layouts.app')
@section('titulo','Admin')
@section('contenido')
    <h1>hola</h1>

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