<!DOCTYPE html>

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

        <!-- actual upload which is hidden -->
        <input type="file" id="actual-btn" hidden/>

        <!-- our custom upload button -->
        <label for="actual-btn">Buscar imagen</label>

        <!-- name of file chosen -->
        <span id="file-chosen">(se admite jpg, png o gif)</span>
        
        
        
        <script>
            const actualBtn = document.getElementById('actual-btn');

            const fileChosen = document.getElementById('file-chosen');

            actualBtn.addEventListener('change', function () {
                fileChosen.textContent = this.files[0].name
            })
        </script>
    </body>

</html>
