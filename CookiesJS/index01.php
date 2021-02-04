//prueba de creación de cokies en javascript y lectura en otra pagina

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
                    if (nombre == "" && correo == "") {
                        mensaje = "Faltan algunos datos, revise por favor.";
                        $("#respuesta").html("<p><strong>" + mensaje + "</strong></p>");
                    } else
                    {
                        
                        mensaje = "datos ok";
                        $("#respuesta").html("<p><strong>" + mensaje + "</strong></p>");
                        
                        //todo crear cookies
                        // ir a otra pagina y recoger cookies
                        document.cookie = "nomC=" + encodeURIComponent( nombre );
                        document.cookie = "corC=" + encodeURIComponent( correo );
                        document.cookie = "opcC=" + encodeURIComponent( opcion );
                        document.cookie = "petC=" + encodeURIComponent( peticion );
                        window.location.href = "recogerPost.php";
                    }
                });
            });


        </script>
    </body>
</html>
