<?php

function limpiarDato($data) {
  $data = trim($data);
  $data = stripslashes($data); // corregido
  $data = htmlspecialchars($data); // faltaba ;
  return $data;
}

function conectarBD() {
    $host = 'localhost';       // o IP del servidor
    $usuario = 'root';         // ejemplo: 'root' en XAMPP
    $clave = '';               // ejemplo: vacío en XAMPP
    $bd = 'empresa_db';        // asegurate que exista esta base

    $conexion = new mysqli($host, $usuario, $clave, $bd);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    return $conexion;
}
?>