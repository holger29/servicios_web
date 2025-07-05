<?php
session_start();

$usuario = trim($_POST['usuario'] ?? '');
$contrasena = trim($_POST['contrasena'] ?? '');

$conn = new mysqli("localhost", "root", "", "servicios_web");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($usuario && $contrasena) {
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
    $stmt->bind_param("ss", $usuario, $contrasena);

    if ($stmt->execute()) {
        $_SESSION['usuario'] = $usuario;
        header("Location: usuarios.php");
        exit;
    } else {
        echo "Error al registrar (¿Usuario duplicado?)";
    }

    $stmt->close();
} else {
    echo "Faltan datos";
}

$conn->close();
?>
