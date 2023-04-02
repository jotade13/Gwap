@extends('layouts.guest')
@section('titulo','Login')
@section('contenido')
    <form action="{{route('login')}}" method="post">
        @csrf
        <div class="titulo-crear">
            <h2 id='Usuario'>Usuario</h2>
        </div>
        <div class="entrada">
            <input type="text" name="usuario" class="input-titulo">
        </div>
        @error('usuario')
            <small>{{$message}}</small>
            <br>
        @enderror
        <div class="titulo-crear">
            <h2 id='titulo'>Contraseña</h2>
        </div>
        <div class="entrada">
            <input type="password" name="password" class="input-titulo">
        </div>
        @error('password')
            <small>{{$message}}</small>
            <br>
        @enderror
        <button type="submit">Ingresar</button>
    </form>
    <a href="{{route('registrar')}}">Registrar</a>
@endsection