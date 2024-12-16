<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1ef2779bde.js" crossorigin="anonymous"></script>
</head>
<body>
<main>
<div class="container-fluid row">
    <form class="col-4 p-3" method='POST'>
        <h2 class="text-center text-secondary">Registro de Usuario</h2>
        <?php
            include 'consultas/conexion.php';
            include 'controlador/registro.php';
        ?>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="ej:soyunejemplo@gmail.com" name="email">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <select class="form-select" aria-label="Default select example" name="rol">
        <option selected>Seleccione un Rol</option>
        <option value="1">Administrador</option>
        <option value="2">Empleado</option>
</select>
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    </form>
    <div class="col-8 p-4">
    <table class="table">
    <h2 class="text-center text-secondary">Tablas de Usuarios</h2>
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Rol</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php
            include 'consultas/conexion.php';
                $sql = $conexion->query("SELECT * FROM usuarios");
            if (!$sql) {
                echo "Error en la consulta: " . $conexion->error;
            } else {
                while ($datos = $sql->fetch(PDO::FETCH_OBJ)) {?>
                <tr>
                    <th scope="row"><?= $datos->id ?></th>
                    <td><?= $datos->nombre ?></td>
                    <td><?= $datos->email ?></td>
                    <td><?= $datos->password ?></td>
                    <td><?= $datos->rol ?></td>
                    <td>
                        <a href="Modificar.php?id=<?$datos->id?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
        <?php }
        }
        ?>
            
        </tbody>
    </table>
    </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>