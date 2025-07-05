<?php
session_start();

$usuario = trim($_POST['usuario'] ?? '');
$contrasena = trim($_POST['contrasena'] ?? '');

$conn = new mysqli("localhost", "root", "", "servicios_web");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($usuario && $contrasena) {
    $stmt = $conn->prepare("SELECT contrasena FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hash);
        $stmt->fetch();

        if ($contrasena === $hash) {
            $_SESSION['usuario'] = $usuario;
            header("Location: usuarios.php");
            exit;
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }

    $stmt->close();
} else {
    echo "Faltan datos";
}

$conn->close();
?>
