<?php

include "controladores/conexion.php";

// Obtener el ID del parámetro de la URL
$id = $_GET['id'];

// Asegúrate de que el ID esté limpio y sea un número entero
$id = intval($id);

if ($id > 0) {
    // Consulta SQL corregida
    $sql = "DELETE FROM productos WHERE id_producto = '$id'";
    
    if (mysqli_query($conexion, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Registro eliminado exitósamente");';
        echo 'window.location="registros.php";'; // Redirige a la página de registros
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Error eliminando registro: ' . mysqli_error($conexion) . '");'; // Muestra el error
        echo 'window.location="registros.php";'; // Redirige a la página de registros
        echo '</script>';
    }
} else {
    echo '<script language="javascript">';
    echo 'alert("ID no válido");';
    echo 'window.location="registros.php";'; // Redirige a la página de registros
    echo '</script>';
}

?>
