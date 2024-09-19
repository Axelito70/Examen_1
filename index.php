<?php
session_start();
require_once("./app/config/dependencias.php");
require_once("./app/controller/inicio.php");

// Inicializar el array de productos si no existe
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

$error = null; // Variable para almacenar mensajes de error
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['producto']) && isset($_POST['precio'])) {
    $producto = trim($_POST['producto']);
    $precio = trim($_POST['precio']);

    // Validar que los campos no estén vacíos y que el precio sea numérico
    if (empty($producto) || empty($precio) || !is_numeric($precio)) {
        $error = "Por favor, ingresa un nombre de producto válido y un precio numérico.";
    } else {
        
        $_SESSION['productos'][] = ['producto' => $producto, 'precio' => $precio];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS."bootstrap.min.css";?>">
    <link rel="stylesheet" href="<?=CSS."inicio.css";?>">
    <link rel="stylesheet" href="<?=ICONS."bootstrap-icons.css";?>">
    <title>Formulario de datos</title>
</head>
<body class="vh-100">
    <div class="row">
        <div class="col"></div>
        <div class="col mt-5 p-5 c-datos">
            <h1 class="text-center text-white mb-5">Bienvenido <i class="bi bi-emoji-sunglasses-fill"></i></h1>
            <h2 class="text-center text-white"><?= $_SESSION['registro']['nombre']." ".$_SESSION['registro']['apellido'];?> </h2>
            <p class="text-center text-white fs-4 mb-4"><?= $_SESSION['registro']['email'] ?></p> 

            <h1 class="text-center text-white">Agregar Producto</h1>
            <form method="POST" class="mb-4">
                <input type="text" name="producto" placeholder="Nombre del producto" required>
                <input type="text" name="precio" placeholder="Precio del producto" required>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>

            <!-- Mostrar mensaje de error si existe -->
            <?php if ($error): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <!-- Listado de productos añadidos -->
            <h2 class="text-white">Productos Añadidos</h2>
            <ul class="list-group">
                <?php if (!empty($_SESSION['productos'])): ?>
                    <?php foreach ($_SESSION['productos'] as $prod): ?>
                        <li class="list-group-item">
                            <?= htmlspecialchars($prod['producto']) ?> - $<?= htmlspecialchars($prod['precio']) ?>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="list-group-item">No hay productos añadidos.</li>
                <?php endif; ?>
            </ul>

            <div class="d-flex justify-content-center mt-4">
                <a href="./cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>
        <div class="col"></div>
    </div>
</body>
</html>
