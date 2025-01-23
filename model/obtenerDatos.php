<?php
// Modelo: funciones relacionadas con la tabla "persona"
function obtenerPersonaPorId($conexion, $id) {
    // Verificar conexión
    if (!$conexion) {
        die("Error: La conexión a la base de datos no es válida.");
    }

    // Agrega esto para depurar
    //echo "ID recibido en la consulta: ";
    //var_dump($id);

    // Preparar consulta SQL
    $stmt = $conexion->prepare("SELECT * FROM persona WHERE id = ?");
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    // Bind de parámetros
    if (!$stmt->bind_param("i", $id)) {
        die("Error en el binding de parámetros: " . $stmt->error);
    }

    // Ejecutar consulta
    if (!$stmt->execute()) {
        die("Error al ejecutar la consulta: " . $stmt->error);
    }

    // Obtener resultados
    $resultado = $stmt->get_result();
    if (!$resultado) {
        die("Error al obtener el resultado: " . $stmt->error);
    }

    //echo "Número de filas encontradas: ";
    //var_dump($resultado->num_rows);

    // Verificar si se encontró algún registro
    if ($resultado->num_rows === 0) {
        return null; // No se encontró el usuario
    }

    // Devolver el objeto de la persona
    return $resultado->fetch_object();
}

function actualizarUsuario($conexion, $id, $nombre, $apellido, $cc, $fecha_nac, $email) {
    //var_dump($id, $nombre, $apellido, $cc, $fecha_nacimiento, $email); // Verificar valores
    
    // Verifica que la conexión sea válida
    if (!$conexion) {
        die("Error: La conexión a la base de datos no es válida.");
    }

    // Prepara la consulta SQL para actualizar el registro
    $stmt = $conexion->prepare("UPDATE persona SET nombre = ?, apellido = ?, cc = ?, fecha_nac = ?, email = ? WHERE id = ?");
    
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    // Realiza el binding (vinculo) de parámetros
    if (!$stmt->bind_param("ssissi", $nombre, $apellido, $cc, $fecha_nac, $email, $id)) {
        die("Error en el binding de parámetros: " . $stmt->error);
    }

    // Ejecuta la consulta
    if (!$stmt->execute()) {
        die("Error al ejecutar la consulta: " . $stmt->error);
    }

    // Devuelve si la operación fue exitosa o no
    return $stmt->affected_rows > 0;
}
