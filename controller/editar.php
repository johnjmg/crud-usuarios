<?php

// Controlador: Obtiene los datos necesarios para la vista o procesa el formulario
include_once (__DIR__ . '/../model/conexion.php');
include_once (__DIR__ . '/../model/obtenerDatos.php');

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica qué valores se están enviando desde el formulario
    var_dump($_POST);
    
    // Obtener el ID desde el formulario enviado por POST
    $id = $_POST['id'] ?? null;

    // Validar el ID
    if (empty($id) || !is_numeric($id) || intval($id) <= 0) {
        die("ID no válido o no proporcionado.");
    }

    // Convertir el ID a entero
    $id = intval($id);

    // Obtener los valores enviados desde el formulario
    $id = $_POST["id"] ?? null;
    $nombre = $_POST["nombre"] ?? null;
    $apellido = $_POST["apellido"] ?? null;
    $cc = $_POST["cc"] ?? null;
    $fecha_nac = $_POST["fecha-nacimiento"] ?? null;
    $email = $_POST["email"] ?? null;

    // Depuración: Mostrar valores recibidos
    //var_dump($id, $nombre, $apellido, $cc, $fecha_nacimiento, $email);
    //die();
   
    // Validaciones
    if (empty($nombre) || empty($apellido) || empty($cc) || empty($fecha_nac) || empty($email)) {
        die("Todos los campos son obligatorios.");
    }
    
    // Llama a la función del modelo para actualizar los datos
     $exito = actualizarUsuario($conexion, $id, $nombre, $apellido, $cc, $fecha_nac, $email);

     if ($exito) {
         // Redirige con un mensaje de éxito
         header("Location: ../index.php?mensaje=Usuario actualizado con éxito");
         exit();
     } else {
         // Redirige con un mensaje de error
         header("Location: ../index.php?mensaje=Error al actualizar el usuario");
         exit();
     }
} else {
    // Si no se ha enviado el formulario, obtener el ID desde la URL (GET)
    $id = $_GET["id"] ?? null;

    // Validar el ID
    if (empty($id) || !is_numeric($id) || intval($id) <= 0) {
        die("ID no válido o no proporcionado.");
    }

    // Convertir el ID a entero
    $id = intval($id);

    // Obtener los datos del usuario con el ID
    $persona = obtenerPersonaPorId($conexion, $id);

    if ($persona === null) {
        die("No se encontró un usuario con el ID proporcionado.");
    }
}
?>


