
        <div id="imagen"></div>
        <input type='text'>
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
        var cambiarImagen = setInterval("cambiar_imagen()",1000); 
    </script>