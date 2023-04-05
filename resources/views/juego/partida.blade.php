@extends('layouts.guest')
@section('Titulo','Partidas')
@section('contenido')
    <h2>
        Partida - {{ $partida->id }}
    </h2>
    <h1>Espacio para imagen</h1>
    <input type="text">
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">Salir</button>            
    </form>
@endsection