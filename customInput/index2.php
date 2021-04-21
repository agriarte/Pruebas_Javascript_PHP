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
        <style>
            label{
                display: inline-block;
                background-color: chocolate;
                color: white;
                padding: 0.5rem;
                font-family: sans-serif;
                border-radius: 0.3rem;
                cursor: pointer;
                margin-top: 1rem;
                border: 2px solid darksalmon;
            }
            #file-chosen{
                margin-left: 0.3rem;
                font-family: sans-serif;
            }
        </style>
    </head>
    <body>

        <div id="divBoton"></div>

        <script>
            document.getElementById("divBoton").innerHTML =
                    '<input type="file" id="actual-btn" hidden/>' +
                    '<label for="actual-btn">Buscar imagen</label>' +
                    '<span id="file-chosen">(se admite jpg, png o gif)</span>';


            const actualBtn = document.getElementById('actual-btn');
            const fileChosen = document.getElementById('file-chosen');
            
            console.log("Log antes de enviar - nueva imagen");
                console.log(fileChosen.textContent);
                console.log(fileChosen.innerHTML);

            actualBtn.addEventListener('change', function () {
                fileChosen.textContent = this.files[0].name;
                console.log("Log despues de enviar - nueva imagen");
                console.log(fileChosen.textContent);
                console.log(fileChosen.innerHTML);
            })

        </script>





    </body>
</html>
