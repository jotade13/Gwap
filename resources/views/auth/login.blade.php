@extends('layouts.guest')
@section('titulo','Login')
@section('contenido')

    <div class=" ml-32 mt-32 px-2 w-32 text-white border-2 border-slate-800 hover:border-slate-400 hover:bg-slate-700 rounded-lg">
        <a class=" w-full p-2 text-white" href="{{route('buscador')}}">Buscador</a>
    </div>
    <div class="rounded-lg bg-slate-900 w-80 h-96 ml-32 mt-1">
        <div class="h-96 flex flex-col items-center " >

            <h1 class="font-serif text-3xl  text-center text-red-600 mt-6 mb-4">Ingresar</h1>
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="titulo-crear mt-6 mb-1">
                    <h2 id='Usuario' class="text-red-50 ">Nombre</h2>
                </div>
                <div class="w-72">
                    <input type="text" name="usuario" placeholder="Escribe tu nombre...." class="w-full text-gray-200 pb-1 bg-slate-900 border-b-2 border-gray-500">
                </div>
                @error('usuario')
                <small>{{$message}}</small>
                <br>
                @enderror
                <div class="titulo-crear mt-6 mb-1">
                    <h2 id='titulo' class="text-red-50 ">Contraseña</h2>
                </div>
                <div class="w-72">
                    <input type="password" name="password" placeholder="Escribe tu contraseña...." class="w-full text-gray-200 pb-1 bg-slate-900 border-b-2 border-gray-500">
                </div>
                @error('password')
                    <small>{{$message}}</small>
                    <br>
                @enderror
                <div class="w-full bg-red-700 rounded-full my-3">
                    <button type="submit" class="w-full ml-auto my-0.5  py-1 text-white">Ingresar</button>
                </div>
            </form>
            <div class="mr-auto ml-3.5 mt-1">
                <a class=" flex justify-left items-left  text-gray-200" href="{{route('registrar')}}">Registrar</a>
            </div>
        </div>
    </div>
@endsection