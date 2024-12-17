<?php
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conexion->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $resultado = $sql->execute();
    
    if ($resultado && $sql->rowCount() > 0) {
        echo '<div class="alert alert-success">Usuario eliminado correctamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar usuario o el usuario no existe.</div>';
    }

    header("Location: Crud.php");
    exit();
} elseif (!empty($_GET["id"])) {
    echo '<div class="alert alert-danger">No tienes permisos para eliminar usuarios.</div>';
}
?>