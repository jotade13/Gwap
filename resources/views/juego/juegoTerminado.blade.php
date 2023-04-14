<script>
    clearInterval(comprobar);
</script>
<div class="grid grid-cols-3 gap-2 mb-4 h-5/6">
    <div class="h-14">
        <h1 class="text-3xl text-center text-white py-2">{{ $jugadores['jugador1']->usuario }}</h1>
    </div>
    <div class="h-14">
        <h1 class="text-3xl text-center text-white py-2">{{ $jugadores['jugador2']->usuario }}</h1>
    </div>
    <div class="h-14">
        <h1 class="text-3xl text-center text-white py-2">{{ $jugadores['jugador3']->usuario }}</h1>
    </div>

    <div class="bg-blue-700 rounded ml-1 border-black  h-full overflow-auto">
        @foreach ($caracteristicas as $caracteristica)
            @if ($caracteristica['id_usuario'] == $jugadores['jugador1']->id)
                @if ($caracteristica['coincidencias']>0)
                    <h1 class="ml-2 text-red-900 text-2xl py-2">{{ $caracteristica->texto }}</h1>
                @else
                    <h1 class="ml-2 text-white text-2xl py-2">{{ $caracteristica->texto }}</h1>
                @endif 
                
            @endif
        @endforeach
    </div>
    <div class="bg-blue-700 rounded border-black  h-full overflow-auto">
        @foreach ($caracteristicas as $caracteristica)
            @if ($caracteristica['id_usuario'] == $jugadores['jugador2']->id)                
                <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
            @endif
        @endforeach
    </div>
    <div class="bg-blue-700 rounded mr-1 border-black  h-full overflow-auto">
        @foreach ($caracteristicas as $caracteristica)
            @if ($caracteristica['id_usuario'] == $jugadores['jugador3']->id)                
                <h1 class="ml-2 text-white py-2">{{ $caracteristica->texto }}</h1>
            @endif
        @endforeach
    </div>
    
</div> 