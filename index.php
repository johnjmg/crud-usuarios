<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD de usuarios (CRUD)</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/f557651dcb.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center p-4">BD de usuarios</h1>
    
    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
        <h3 class="py-3">Registro de usuarios</h3>
        
        <?php 
        //include "model/conexion.php";
        include_once "controller/registro.php";
        //include "controller/editar.php";
        ?>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Número de identificación</label>
            <input type="number" class="form-control" name="cc">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fecha-nacimiento">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="email">
        </div>
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form> 

        <div class="col-8 p-4">
           
           <?php  
                //Recoge el mensaje del header del controlador (editar.php) y lo muestra en este espacio 
                if (isset($_GET['mensaje'])) {
                    echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($_GET['mensaje']) . '</div>';
                } 
            ?>

            <!-- Esto muestra el mensaje de eliminación de usuario--> 
            <?php if (isset($_GET['mensaje'])): ?>
                <?php if ($_GET['mensaje'] == 'Eliminado'): ?>
                    <div class="alert alert-danger" role="alert">
                        Usuario eliminado con éxito.
                    </div>
                <?php elseif ($_GET['mensaje'] == 'error'): ?>
                    <div class="alert alert-danger" role="alert">
                        Hubo un error al eliminar el usuario.
                    </div>
                <?php elseif ($_GET['mensaje'] == 'error_id'): ?>
                    <div class="alert alert-danger" role="alert">
                        ID no válido para eliminar.
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Número de identificación</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include "model/conexion.php";
                    $sql=$conexion->query("SELECT * FROM persona");
                    while($datos=$sql->fetch_object()){ ?>
                    
                    <tr>
                    <th scope="row"><?= $datos ->id?></th> <!-- nota: se usa = para imprimir, así como el echo "" --> 
                    <td><?= $datos ->nombre?></td>
                    <td><?= $datos ->apellido?></td>
                    <td><?= $datos ->cc?></td>
                    <td><?= $datos ->fecha_nac?></td>
                    <td><?= $datos ->email?></td>
                    <td>
                        <a href="editarUsuario-view.php?id=<?= $datos->id?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="controller/eliminar.php?id=<?= $datos->id ?>" target="_blank" rel="noopener noreferrer" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?');"><i class="fa-solid fa-trash"></i></a>
                    </td>
                    </tr>
                  
                <?php
                    }
                ?>
                
            </tbody>
            </table>
        </div>
    </div>
    
    <!-- Bootstrap functions js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>