@extends('layouts.guest')
@section('titulo','Registrar')
@section('contenido')

<div class="rounded-lg bg-slate-900 w-80 h-5/6 ml-32 my-32">
    <div class="h-96 flex flex-col items-center " >

        <h1 class="font-serif text-3xl  text-center text-red-600 mt-2 mb-4">Registrar</h1>
        <form action="{{route('registrar')}}" method="post">
            @csrf
            <div class="mt-2 mb-1">
                <h2 id='Usuario' class="text-red-50 ">Nombre</h2>
            </div>
            <div class="w-72">
                <input type="text" name="nombre" placeholder="Escribe tu nombre...." class="w-full text-gray-200 pb-1 bg-slate-900 border-b-2 border-gray-500">
            </div>
            <div class="mt-2 mb-1">
                <h2 id='Usuario' class="text-red-50 ">Usuario</h2>
            </div>
            <div class="w-72">
                <input type="text" name="usuario" placeholder="Escribe tu Usuario...." class="w-full text-gray-200 pb-1 bg-slate-900 border-b-2 border-gray-500">
            </div>
            <div class="mt-2 mb-1">
                <h2 id='titulo' class="text-red-50 ">Contraseña</h2>
            </div>
            <div class="w-72">
                <input type="password" name="password" placeholder="Escribe tu contraseña...." class="w-full text-gray-200 pb-1 bg-slate-900 border-b-2 border-gray-500">
            </div>
            <div class="mt-2 mb-1">
                <h2 id='titulo' class="text-red-50 ">Confirmacion de contraseña</h2>
            </div>
            <div class="w-72">
                <input type="password" name="password_confirmation" placeholder="Repite tu contraseña...." class="w-full text-gray-200 pb-1 bg-slate-900 border-b-2 border-gray-500">
            </div>
            <div class="mt-2 mb-1">
                <h2 id='titulo' class="text-red-50 ">Edad</h2>
            </div>
            <div class="w-72">
                <input type="number" placeholder="0" name="edad" class="w-full text-gray-200 pb-1 bg-slate-900 border-b-2 border-gray-500">
            </div>
            <div class="mt-2 mb-1">
                <h2 id='titulo' class="text-red-50 ">Sexo</h2>
            </div>
            <div class="entrada">
                <label class="text-gray-200" > M <input type="radio" name="sexo" value="Masculino"></label>
                <label class="text-gray-200">F <input type="radio" name="sexo" value="Femenino"></label>
            </div>
            <div class="w-full bg-red-700 rounded-full ">
                <button type="submit" class="w-full ml-auto my-0.5  py-1 text-white">Registrame</button>
            </div>
        </form>
        <div  class="mr-auto ml-3.5 ">
            <a class=" flex justify-left items-left  text-gray-200" href="{{route('login')}}">Ingresar</a>
        </div>

        </div>
    </div>
@endsection