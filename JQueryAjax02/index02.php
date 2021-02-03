<!-- https://blog.trescomatres.com/2020/08/pequeno-ejemplo-ajax-con-jquery/ -->

<!DOCTYPE html>
<html>
    <head>
        <title>Ejemplo AJAX con jQuery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>


        <script type="text/javascript">
            function validarUsuario() {
                // Cogemos del formulario el valor nom
                pnom = $('#nom').val();
                // Cogemos del formulario el valor pass
                ppass = $('#pass').val();
                // Función que envía y recibe respuesta con AJAX
                $.ajax({
                    type: 'POST', // Envío con método POST
                    url: 'consulta.php', // Fichero destino (el PHP que trata los datos)
                    data: {nom: pnom, pass: ppass} // Datos que se envían
                }).done(function (msg) {  // Función que se ejecuta si todo ha ido bien
                    $("#consola").html(msg);  // Escribimos en el div consola el mensaje devuelto
                }).fail(function (jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
                    // Mostramos en consola el mensaje con el error que se ha producido
                    $("#consola").html("The following error occured: " + textStatus + " " + errorThrown);
                });
            }
        </script>
    </head>
    <body>
        <strong>Validar usuario</strong>
        <form id="validador"><label for="nom">Nombre</label>
            <input id="nom" type="text" name="nom" placeholder="Inserte su nombre" />
            <label for="pass">Password</label>
            <input id="pass" type="password" name="pass" /> 
            <!-- Botón que hace la llamada a la función validarUsuario() para enviar formulario -->
            <input onclick="validarUsuario()" type="button" value="Validar usuario" /> 
            <!-- Consola dónde mostramos mensajes devueltos -->
            <div id="consola">Bienvenido</div>
        </form>
    </body>
</html>
