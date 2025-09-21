<?php
include 'funciones/funciones_clientes.php';

$conexion = conectarBD();
$sql = "SELECT * FROM clientes";
$resultado = $conexion->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}

$campos = ["nombre", "apellido", "empresa", "domicilio", "ciudad", "pais", "telefono", "email"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Clientes</title>
  <link href="estilos/estilos.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h1>Listado de Clientes</h1>

    <?php
    if ($resultado->num_rows > 0) {
        echo "<table>";
        
        // Cabecera
        echo "<thead><tr>";
        foreach ($campos as $campo) {
            echo "<th>" .($campo) . "</th>";
        }
        echo "</tr></thead>";

        // Cuerpo
        echo "<tbody>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            foreach ($campos as $campo) {
                echo "<td>" .($fila[$campo] ?? '') . "</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='error'.</div>";
    }

    $conexion->close();
    $resultado->free();
    ?>
  </div>
</body>
</html>