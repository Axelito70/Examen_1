<?php
session_start();

$expresion = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

if (isset($_SESSION['usuario'])) {
    header("location: ./index.php");
}

if ($_POST) {
    if (isset($_POST['nombre']) && !empty($_POST['nombre']) && 
        isset($_POST['apellido']) && !empty($_POST['apellido']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['pass']) && !empty($_POST['pass'])) {

        if(is_numeric($_POST['nombre'])) {
            echo "<script>alert('No puedes agregar numeros en el input nombre');</script>";
        } else if(is_numeric($_POST['apellido'])) {
            echo "<script>alert('No puedes agregar numeros en el input apellido');</script>";
        } else {
            if (preg_match($expresion,$_POST['email'])) {
                echo "<script>alert('CORRECTO');</script>";
            } else {
                echo "<script>alert('INCORRECTO');</script>";
            }
        }

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
    
        $_SESSION['registro'] = [
            "nombre" => $nombre,
            "apellido" => $apellido,
            "email" => $email,
            "pass" => $pass
        ];
    
        header('location:./login.php');
    } else {
        echo "<script>alert('No puedes dejar campos vacios');</script>";
    }
}



?>