@extends('layouts.guest')
@section('titulo','Registrar')
@section('contenido')
    <form action="{{route('Registrar')}}" method="post">
    @csrf
    <div class="titulo-crear">
        <h2 id='titulo'>Nombre</h2>
    </div>
    <div class="entrada">
        <input type="text" name="name" class="input-titulo">
    </div>
    <div class="titulo-crear">
        <h2 id='correo'Usuario>Usuario</h2>
    </div>
    <div class="entrada">
        <input type="email" name="Usuario" class="input-titulo">
    </div>
    <div class="titulo-crear">
        <h2 id='titulo'>Contraseña</h2>
    </div>
    <div class="entrada">
        <input type="password" name="password" class="input-titulo">
    </div>
    <div class="titulo-crear">
        <h2 id='titulo'>Confirmacion de contraseña</h2>
    </div>
    <div class="entrada">
        <input type="password" name="password_confirmation" class="input-titulo">
    </div>
    <div class="titulo-crear">
        <h2 id='titulo'>Edad</h2>
    </div>
    <div class="entrada">
        <input type="number" name="edad" class="input-titulo">
    </div>
    <div class="titulo-crear">
        <h2 id='titulo'>Sexo</h2>
    </div>
    <div class="entrada">
        <select name='sexo'>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
    </div>
    <button type="submit">Registrarme</button>
@endsection