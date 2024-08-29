<?php 
$sku = mb_strtoupper($_POST['sku']);
$nombre = mb_strtoupper($_POST['nombre']);
$color = mb_strtoupper($_POST['color']);
$tipo = mb_strtoupper($_POST['tipo']);
$ean = mb_strtoupper($_POST['ean']);

include "conexion.php";

$insertar = "INSERT INTO productos (sku, nombre, color, tipo, ean) VALUES ('$sku', '$nombre', '$color', '$tipo', '$ean')";

if ($conexion -> query($insertar) == true) {
    header('location: ../registros.php');
}else{
    header('location: ../index.php');
}

$conexion -> close();
?>