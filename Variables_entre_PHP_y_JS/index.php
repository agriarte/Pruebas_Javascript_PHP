
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>Intercambio de variables PHP a JavasScript</p>
        <?php
        $miVarPHP = "Hola soy un string en PHP";
        $miVarPHP2 = 15;
        ?>
        <div id="salida"></div>
        
        <div id="salida2"></div>
        
         <div id="salida3"></div>
        
        
        <script>
        document.getElementById('salida').innerHTML = '<?php echo json_encode($miVarPHP); ?>';
        //para evitar comillas en cadenas usar htmlspecialchars que las omite
        //document.getElementById('salida').innerHTML = '<?php echo htmlspecialchars($miVarPHP); ?>';
        
        let x = <?php echo json_encode($miVarPHP2); ?>;
        document.getElementById('salida2').innerHTML = x;
        
        
        document.getElementById('salida3').innerHTML ="cadena mas variable" + x;
        
        </script>
    </body>
</html>
