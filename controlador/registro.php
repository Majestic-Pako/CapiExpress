<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["rol"])) {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $rol = $_POST["rol"];

        // Verificar si el correo ya existe
        $verificarCorreo = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email");
        $verificarCorreo->bindParam(':email', $email);
        $verificarCorreo->execute();

        if ($verificarCorreo->rowCount() > 0) {
            echo '<div class="alert alert-danger">El correo ya está registrado.</div>';
        } else {
            // Insertar el nuevo usuario
            $sql = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (:nombre, :email, :password, :rol)");
            $sql->bindParam(':nombre', $nombre);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':password', $password);
            $sql->bindParam(':rol', $rol);

            if ($sql->execute()) {
                echo '<div class="alert alert-success">Usuario registrado correctamente.</div>';
            } else {
                echo '<div class="alert alert-danger">Error al registrar el usuario.</div>';
            }
        }
    } else {
        echo '<div class="alert alert-warning">Algunos campos están vacíos.</div>';
    }
}
?>