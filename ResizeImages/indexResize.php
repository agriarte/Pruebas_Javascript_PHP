<html>
<head>
<title>JavaScript Image Resize</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<style>
body {
    font-size: 16px;
    font-family: Arial;
}

</style>
<script type="text/javascript">
function _resize(img, maxWidth, maxHeight) 
{
    var ratio = 1;
    var canvas = document.createElement("canvas");
    canvas.style.display="none";
    document.body.appendChild(canvas);

    var canvasCopy = document.createElement("canvas");
    canvasCopy.style.display="none";
    document.body.appendChild(canvasCopy);

    var ctx = canvas.getContext("2d");
    var copyContext = canvasCopy.getContext("2d");

        if(img.width > maxWidth)
                ratio = maxWidth / img.width;
        else if(img.height > maxHeight)
                ratio = maxHeight / img.height;

        canvasCopy.width = img.width;
        canvasCopy.height = img.height;
try {
        copyContext.drawImage(img, 0, 0);
} catch (e) { 
    document.getElementById('loader').style.display="none";
    alert("There was a problem - please reupload your image");
    return false;
}
        canvas.width = img.width * ratio;
        canvas.height = img.height * ratio;
        // the line to change
        //ctx.drawImage(canvasCopy, 0, 0, canvasCopy.width, canvasCopy.height, 0, 0, canvas.width, canvas.height);
        // the method signature you are using is for slicing
        ctx.drawImage(canvasCopy, 0, 0, canvas.width, canvas.height);
        var dataURL = canvas.toDataURL("image/png");
        document.body.removeChild(canvas);
        document.body.removeChild(canvasCopy);

        return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");


};

function resize() { 
    var photo = document.getElementById("photo");

    if(photo.files!=undefined){ 
        var loader = document.getElementById("loader");
        loader.style.display = "inline";
        var file  = photo.files[0];
        document.getElementById("orig").value = file.fileSize;
        var preview = document.getElementById("preview");
        var r = new FileReader();
        r.onload = (function(previewImage) { 
            return function(e) { 
                var maxx = 500;
                var maxy = 500;
                previewImage.src = e.target.result; 
                var k = _resize(previewImage, maxx, maxy);
                if(k!=false) { 
                document.getElementById('base64').value= k;
                document.getElementById('upload').submit();
                } else {
                alert('problem - please attempt to upload again');
                }
            }; 
        })(preview);
        r.readAsDataURL(file);
    } else {
        alert("Seems your browser doesn't support resizing");
    }
    return false;
}

</script>
</head>
<body>

<div align="center">
<h2>Image Resize Demo</h2>

    <input type="file" name="photo" id="photo">
    <br> 
    <br>    
    <input type="button" onClick="resize();" value="Resize">
    <img src="loader.gif" id="loader" />
    <img src="" alt="Image preview" id="preview">
   <form name="upload" id="upload" method='post' action='show.php'>
        <textarea name="base64" id="base64" rows='10' cols='90'></textarea>
        <input type="hidden" id="orig" name="orig" value=""/>
   </form>
</div>

</body>
</html>