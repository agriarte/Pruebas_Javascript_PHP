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
        <script src="js/compressor.js"></script>
        <!-- JS, Popper.js, and jQuery -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </head>
    <body>
        <form id="form" name="cargarImagen" action="" method="post" enctype="multipart/form-data">
            <p>un input text</p> 
            <input type="text" id="text1" name="texto-nombre">
            <p>un input file</p> 
            <input type="file" id="image" name="nombreFichero">
            <!-- A hidden input is needed to put the image data after compression. -->
            <!-- validamos con el Blob de la imagen. El input visible enseña el nombre de la imagen
                 y el invisible contiene los datos de la imagen en formato blob-->       
            <input type="hidden" id="image-temp" name="imagen-copia">
            <input type="submit" name="cargarImagen" value="Enviar">
        </form>
        <img id="output" />
        <script>
            //bloque que escucha entrada de archivo en input.
            //si se produce lo carga en memoria lo muestra redimensionado y comprimido
            //EVENTO change en Jquery: $('#image').change(function (e) {
            var fotoId = document.getElementById('image');
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
                                //en Juery: $('#image-temp').val(base64data);
                                document.getElementById('image-temp').value = base64data;

                                const blobUrl = URL.createObjectURL(result) // result is the Blob object
                                document.getElementById('output').src = blobUrl // image is the image element from the DOM

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
                file_put_contents('images/foto1.jpg', file_get_contents($_POST['imagen-copia']));
                echo "<br>";
                echo "FILES nombreFichero " . $_FILES['nombreFichero']['name'];
                echo "<br>";
                echo "POST imagen-copia " . $_POST['imagen-copia'];
            }
        }
        ?>
    </body>
</html>
