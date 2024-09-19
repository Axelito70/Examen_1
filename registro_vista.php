<?php
require_once("./app/config/dependencias.php");
require_once("./app/controller/registro.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS."bootstrap.min.css";?>">
    <link rel="stylesheet" href="<?=ICONS."bootstrap-icons.css";?>">
    <link rel="stylesheet" href="<?=CSS."registro_vista.css";?>">
    <title>Formulario de datos</title>
</head>
<body class="vh-100 d-flex justify-content-center align-items-center">
    <form action="./registro_vista.php" method="post" class="w-25 p-4">
        <div class="text-center mb-4 c-user">
           
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
           
            <input type="text" class="form-control" placeholder="Ingrese su nombre" name="nombre" value="<?= (!empty($_POST['nombre'])) ? $_POST['nombre'] : ''; ?>">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            
            <input type="text" class="form-control" placeholder="Ingrese su apellido" name="apellido" value="<?= (!empty($_POST['apellido'])) ? $_POST['apellido'] : ''; ?>">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            
            <input type="email" class="form-control" placeholder="Ingrese su email" name="email" value="<?= (!empty($_POST['email'])) ? $_POST['email'] : ''; ?>">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            
            <input type="password" class="form-control" placeholder="Ingrese su contraseña" name="pass" value="<?= (!empty($_POST['pass'])) ? $_POST['pass'] : ''; ?>">
        </div>
        <div class="mt-3 c-button">
            <button type="submit" class="btn w-100 text-white fs-4">Registrar</button> 
        </div>
    </form>
</body>
</html>