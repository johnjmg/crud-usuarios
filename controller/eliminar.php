<?php
// Incluir conexión a la base de datos
include_once(__DIR__ . '/../model/conexion.php');

// Verifica si se recibió el ID de la URL
$id = $_GET['id'] ?? null; // Obtiene el ID de la URL (si no existe, será null)

// Si no se proporciona un ID o es inválido, redirigir con un mensaje de error
if ($id === null || !is_numeric($id) || intval($id) <= 0) {
    header('Location: ../index.php?mensaje=error_id');
    exit;
}

// Preparar la consulta SQL para eliminar el registro
$stmt = $conexion->prepare("DELETE FROM persona WHERE id = ?");
if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

// Vincular el parámetro
if (!$stmt->bind_param("i", $id)) {
    die("Error al vincular el parámetro: " . $stmt->error);
}

// Ejecutar la consulta
if ($stmt->execute()) {
    // Si la eliminación fue exitosa, redirige con mensaje de éxito
    header("Location: ../index.php?mensaje=Eliminado");
    exit;
} else {
    // Si hubo un error al eliminar, redirige con mensaje de error
    header("Location: ../index.php?mensaje=Error");
    exit;
}
?>
