<?php
if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'];
    $sqlDelete = $conexion->prepare("DELETE FROM productos WHERE id = :id");
    $sqlDelete->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($sqlDelete->execute()) {
        echo '<div class="alert alert-success">Producto eliminado correctamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar el producto.</div>';
    }
}
?>
