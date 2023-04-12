
        <div id="imagen"></div>
        <input type='text' id="escribir">
        <button onclick="enviar_caracteristica()">enviar</button>
        <div id="hide"></div>
        <div id="caracteristicas"></div>
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
        function teclado(e){
            if(e.which==13)
            {
                enviar_caracteristica();
            }
        }
        function enviar_caracteristica()
        {      
            var caracteristica = $("#escribir").val();
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