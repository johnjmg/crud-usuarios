<?php
// Conexión a la base de datos
include_once("model/conexion.php");

if (isset($_POST['btnregistrar'])) {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cc = $_POST['cc'];
    $fecha_nac = $_POST['fecha-nacimiento'];
    $email = $_POST['email'];

    // Verificar si el número de identificación (CC) ya existe
    $query = "SELECT * FROM persona WHERE cc = ? OR email = ?";
    $stmt = $conexion->prepare($query);
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conexion->error);
    }
    $stmt->bind_param("is", $cc, $email); // 'i' para entero (cc), 's' para string (email)
    $stmt->execute();
    $result = $stmt->get_result();

    // Si el resultado tiene más de 0 filas, significa que el usuario ya existe
    if ($result->num_rows > 0) {
        // El usuario ya existe, mostrar un mensaje
        echo '<div class="alert alert-danger" role="alert">El usuario ya está registrado con ese número de identificación o correo electrónico.</div>';
    } else {
        // Si el usuario no existe, continuar con la inserción
        $insert_query = "INSERT INTO persona (nombre, apellido, cc, fecha_nac, email) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $conexion->prepare($insert_query);

        // Verificar que la preparación de la consulta INSERT fue exitosa
        if ($stmt_insert === false) {
            die("Error al preparar la consulta de inserción: " . $conexion->error);
        }

        // Vincular los parámetros
        $stmt_insert->bind_param("ssiss", $nombre, $apellido, $cc, $fecha_nac, $email); // 's' para string, 'i' para entero

        // Ejecutar la consulta
        if ($stmt_insert->execute()) {
            // Si la inserción es exitosa, mostrar un mensaje de éxito
            echo '<div class="alert alert-success" role="alert">Usuario registrado con éxito.</div>';
        } else {
            // Si hubo un error en la inserción, mostrar un mensaje de error
            echo '<div class="alert alert-danger" role="alert">Hubo un error al registrar el usuario.</div>';
        }

        // Cerrar la consulta de inserción
        $stmt_insert->close();
    }

    // Cerrar la consulta de verificación
    $stmt->close();
}