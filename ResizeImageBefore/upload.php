<?php

//directory
$target_dir = "images/";

//catch the image sent from client
$image = $_POST['image'];

//replacing some characters from the base64
$image = str_replace('data:image/png;base64,', '', $image);
$image = str_replace(' ', '+', $image);

//decoding the base64
$data = base64_decode($image);	

//generating and unique name (or write manually one name)
$unique = uniqid();

//setting the path
$file = $target_dir.$unique.'.jpg';//attach an extension .png .jpg 

//putting all the content into a file
$success = file_put_contents($file, $data);

//if everything was ok send back an json response
if($success != false)
  echo '{"success": true}'; 

?> 