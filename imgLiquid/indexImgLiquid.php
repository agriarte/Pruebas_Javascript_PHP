<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title>Image</title>

        <style>
            .container{
                background-color:#f7f7f7;
                border:2px solid #ccc;
                margin:10px;
                display:inline-block;
            }
            .imgLiquid {
                display:block;
                overflow: hidden;
                background:transparent url('https://viajarporescocia.com/contenido/uploads/xfoto_principal.jpg.pagespeed.ic.XZUqovi1xZ.webp') no-repeat center center;
            }
            .imgLiquid img{
                visibility:hidden;
            }
        </style>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"
        type="text/javascript"></script>
        <script type="text/javascript"
        src="https://raw.github.com/karacas/imgLiquid/master/src/js/imgLiquid-min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".imgLiquidFill").imgLiquid({
                    fill: true,
                    fadeInTime: 200,
                    horizontalAlign: "center",
                    verticalAlign: "top"
                });
            });
        </script>
    </head>

    <body>  
        <div class="container">
            <span class="imgLiquidFill imgLiquid" style="width:250px; height:250px;">
                <a href="/media/Woody.jpg"  target="_blank" title="test">
                    <img alt="jhgjfgjhf" src="/media/Woody.jpg"/>
                </a>
            </span>
        </div>
    </body>
</html>