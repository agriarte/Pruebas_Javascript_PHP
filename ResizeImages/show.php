<html>
<head>
<title>JavaScript file upload</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<style>
body {
    font-size: 16px;
    font-family: Arial;
}
#preview {
    display:none;
}
#base64 {
    display:none;
}
</style>
</head>
<body>
<?php
$base64size = strlen($_POST['base64']);
$f = base64_decode($_POST['base64']);
$name = microtime(true).".png";
file_put_contents("./$name", $f);
#header("Content-type: image/png");
#header("Content-Disposition: attachment; filename=\"shrunk.png\"");
#echo $f;
#die();
?>
<h2>Shrunk file</h2>
<p>Original file was: <?=$_POST['orig'];?> bytes</p>
<p>Transmitted size was: <?=$base64size;?> bytes (due to base64)</p>
<p>New file is: <?=filesize("./$name");?> bytes</p>
<p><img src="<?=$name;?>"/></p>
</body>
</html>