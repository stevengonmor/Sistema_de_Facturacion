<?php

if ($_POST) {
    include "model/user.php";
    $validation_user = new User(0, "", "", addslashes($_POST['email']));
    if ($validation_user->email_exists(addslashes($_POST['email']))) {
        if ($validation_user->correct_password($_POST['email'], md5($_POST['password']))) {
            $user = $validation_user->select();
            $_SESSION['id'] = $user->get_id();
            $_SESSION['name'] = $user->name;
            $_SESSION['profile_picture'] = $user->profile_picture;
            $_SESSION['rol'] = $user->rol;
            $_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/Sistema_de_Facturacion/";
            header('Location: '.$_SESSION['url']);
        } else {
            $msg = "Contraseña incorrecta.";
            include "view/log_in.php";
        }
    } else {
        $msg = "E-mail incorrecto.";
        include "view/log_in.php";
    }
} else {
    $msg = "Necesita iniciar sesión.";
    include "view/log_in.php";
}
    