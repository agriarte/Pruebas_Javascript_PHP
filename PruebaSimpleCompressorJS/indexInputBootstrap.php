<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Bootstrap  -->
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/9c0c203a4a.js" crossorigin="anonymous"></script>
        
        <script src="js/compressor.js"></script>
        <!-- JS, Popper.js, and jQuery -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    </head>
    <body>
        
        <br><br><br>&nbsp;boton Custom<br>
        
        <form  class="form-inline" id="form" name="cargarImagen2" action="" method="post" enctype="multipart/form-data">
            <!-- actual upload which is hidden -->
            <input type="file" id="actual-btn" hidden name="nombreFichero"/>
            <!-- our custom upload button -->
            <label class="btn btn-sm btn-dark m-1" for="actual-btn"><i class="fas fa-camera"></i>&nbsp;Buscar imagen</label>
            <!-- name of file chosen -->
            <span class="m-1" id="file-chosen">(se admite jpg, png o gif)</span>
            <!-- oculto, sirve para copiar blob -->
             <input type="hidden" id="image-temp" name="imagen-copia">
             
             <input class="btn btn-sm btn-dark m-1" type="submit" name="cargarImagen" value="Enviar">
             
        </form>
        <img id="output2" />
        <script>
            const actualBtn = document.getElementById('actual-btn');

            const fileChosen = document.getElementById('file-chosen');

            actualBtn.addEventListener('change', function () {
                fileChosen.textContent = this.files[0].name
            })
        </script>
        <script>
            //COPIA bloque que escucha entrada de archivo en input.
            //si se produce lo carga en memoria lo muestra redimensionado y comprimido
            //EVENTO change en Jquery: $('#image').change(function (e) {
            var fotoId = document.getElementById('actual-btn');
            fotoId.addEventListener('change', (e) => {

                var img = e.target.files[0];
                if (!(/\.(jpg|png|gif)$/i).test(img.name)) {
                    alert('El archivo a adjuntar no es una imagen jpg, png o gif');
                } else {

                    new Compressor(img, {
                        quality: 0.5,
                        maxWidth: 600,
                        maxHeight: 600,
                        success(result) {
                            var reader = new FileReader();
                            reader.readAsDataURL(result);
                            reader.onloadend = function () {
                                var base64data = reader.result;
                                //en Jquery: $('#image-temp').val(base64data);
                                document.getElementById('image-temp').value = base64data;

                                const blobUrl = URL.createObjectURL(result) // result is the Blob object
                                document.getElementById('output2').src = blobUrl // image is the image element from the DOM

                                console.log(result);
                                console.log(reader);
                            }
                        },
                    });
                }
            });
        </script>


        <?php
        if (isset($_POST['cargarImagen'])) {
            if (!empty($_POST['imagen-copia'])) {
                file_put_contents('images/foto2.jpg', file_get_contents($_POST['imagen-copia']));
                echo "<br>";
                echo "$_FILES nombreFichero " . $_FILES['nombreFichero']['name'];
                echo "<br>";
                echo "$_POST imagen-copia " . $_POST['imagen-copia'];
                
            }
        }
        ?>
    </body>
</html>
