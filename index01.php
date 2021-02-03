<!-- https://www.cablenaranja.com/ajax-sencillo-con-php-y-jquery/ -->

<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Prueba de Ajax</title>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    </head>
    <body>
        <h1>Enviando datos de forma asíncrona con AJAX</h1>
        <p>Por favor, introduce los siguientes datos</p>
        <form>
            <p><label>¿Cuál es tu nombre?</label> <input type="text" id="txtNombre" required /></p>
            <p><label>¿Nos das tu correo?</label> <input type="email" id="txtCorreo" required /></p>
            <p><label>¿Cómo escuchaste de nosotros?</label> <select id="cmbMedio">
                    <option value="1">Facebook</option>
                    <option value="2">Twitter</option>
                    <option value="3">Whatsapp</option>
                    <option value="3">Un amigo</option>
                </select></p>
            <p><input type="checkbox" id="chkPeticion" /> <label>¿Quieres recibir nuestro contenido en tu email?</label></p>
            <p><input type="submit" value=" Aceptar " id="btnOk" /></p>
        </form>
        <div id="respuesta"></div>

        <script>
            // Archivo javascript que manipulará Ajax con jQuery
            $(function () {
                $("#btnOk").click(function (evt) {
                    evt.preventDefault();

                    var nombre = $("#txtNombre").val();
                    var correo = $("#txtCorreo").val();
                    var opcion = $("#cmbMedio").val();
                    var peticion = false;
                    if ($("#chkPeticion").prop("checked"))
                        peticion = true;
                    $.ajax({
                        url: "datos.php",
                        method: "POST",
                        data: {nom: nombre, cor: correo, opc: opcion, pet: peticion},
                        success: function (dataresponse, statustext, response) {
                            var mensaje = "";
                            if (dataresponse == "ok") {
                                mensaje = "Gracias por sus datos.";
                                window.location = "recogerPost.php";
                            } else {
                                mensaje = "Faltan algunos datos, revise por favor." + dataresponse;
                            }
                            $("#respuesta").html("<p><strong>" + mensaje + "</strong></p>");
                        },
                        error: function (request, errorcode, errortext) {
                            $("#respuesta").html("<p>Ocurrió el siguiente error: <strong>" + errortext + "</strong></p>");
                        }
                    });
                });
            });
        </script>
    </body>
</html>
