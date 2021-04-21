<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Ejemplo básico de Fetch sin funcion flecha</div>
        <p id="demo">Cambiar este texto con Fetch</p>
        <script>

            let file = "texto.txt";

            fetch('texto.txt')
                    .then(function (x) {
                        return x.text();
                    }).then(function (y) {
                document.getElementById("demo").innerHTML = y;
            });

        </script>
    </body>
</html>