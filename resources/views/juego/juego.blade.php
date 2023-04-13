    <div class="grid grid-cols-3 gap-3 h-5/6 ">
        <div class="h-5/6 bg-slate-700 col-span-2 mt-3 ml-3 rounded-md flex items-center justify-center " id="imagen"> </div>
        <div class="h-5/6 bg-white mt-3 mr-3 rounded-md overflow-auto">
            <h1 class="text-xl sm:text-2xl text-center">Palabras</h1>
            <div class="" id="caracteristicas"> </div>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-3">
        <div class="col-span-2 ml-2">            
            <input type='text' id="escribir" class=" text-black-200 py-1.5 rounded-lg w-full border-2 border-gray-500">
        </div>
        <div class=" mr-3 bg-red-700 rounded-lg">
            <button class="w-full ml-auto my-0.5  py-1 text-white" onclick="enviar_caracteristica()">ENVIAR</button>
        </div>
    </div>
        <div id="hide"></div>
    <script>
       clearInterval(comprobar);   //pausa la comprobacion de empezar la partida
       function cambiar_imagen()
        {               
            $.ajax({     //cambia la imagen de la partida
                url: "{{ route('cambioImagen',['partida'=>$partida])}}",
                type: "get", 
                
                success: function (imagen) {
                    $('#imagen').html(imagen);
                }
            });
        }
        document.addEventListener("keydown", function(event)
        {
            if (event.code === "Enter") 
            {
                enviar_caracteristica();
                
            }
        });
        function enviar_caracteristica()
        {      
            var caracteristica = $("#escribir").val();
            if(caracteristica!="")
            {
                var parametros = 
            {           
                "caracteristica" : caracteristica
            };         
            $.ajax({
                
                data: parametros,
                url: "{{ route('enviarCaracteristica',['partida'=>$partida])}}",
                type: "get",

                success: function (caract) {
                    $('#hide').html(caract);
                    $('#escribir').val('');
                }
            });
            mostrar_caracteristicas();
            }
        }
        var cambiarImagen = setInterval("cambiar_imagen()",1000);
        function mostrar_caracteristicas()
        {              
            $.ajax({

                url: "{{ route('mostrarCaracteristicas',['partida'=>$partida])}}",
                type: "get",

                success: function (caract) {
                    $('#caracteristicas').html(caract);
                }
            });
        }
        var mostrarCaracteristicas = setInterval("mostrar_caracteristicas()",1000)
    </script>