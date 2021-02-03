<?php

// data: { nom: nombre, cor: correo, opc: opcion, pet: peticion },
if (count($_POST) <> 4)
    die("Error al procesar datos");
else {
    $nombre = $_POST["nom"];
    $correo = $_POST["cor"];
    $opcion = $_POST["opc"];
    $peticion = $_POST["pet"];
    $correcto = true;

    //prueba de crear cookies
    setcookie("nomC", $nombre, time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("corC", $correo, time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("opcC", $opcion, time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("petC", $peticion, time() + (86400 * 30), "/"); // 86400 = 1 day

    if (strlen(trim($nombre)) < 3) {
        $correcto = false;
    }
    if (strlen(trim($correo)) < 5) {
        $correcto = false;
    }
    if ($correcto)
        echo "ok";
    else
        echo "no ok";
}
?>