<?php

$conexion= new mysqli ("localhost", "root", "", "crud-usuarios"); //ubicación, usuarioDB, passDB, nombreDB, puerto(se omite en este caso)
$conexion -> set_charset("utf8"); //para reconocer caracteres especiales

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}
//el siguiente mensaje solo es un test para saber si estaba bien la conexión pero no es necesario que aparezca todo el tiempo
//echo "Conexión exitosa";