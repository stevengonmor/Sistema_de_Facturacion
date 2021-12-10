<?php

if ($_POST) {
    include "model/user.php";
    $validation_user = new User();
    if (!$validation_user->email_exists(addslashes($_POST['email']))) {
        if (!empty($_FILES["profile_picture"]["name"])) {
            $file = basename($_FILES["profile_picture"]["name"]);
            $type = pathinfo($file, PATHINFO_EXTENSION);
            $allowed = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array(strtolower($type), $allowed)) {
                $profile_picture = $_FILES["profile_picture"]["tmp_name"];
            } else {
                $profile_picture = "./img/user.png";
                $msg = "No se guardó la foto, formato inválido.";
            }
        } else {
            $profile_picture = "./img/user.png";
        }
        $img_string = addslashes(file_get_contents($profile_picture));
        $new_user = new User(0, addslashes($_POST['name']), "", addslashes($_POST['email']), addslashes(md5($_POST['password'])), $img_string, 0);
        if ($new_user->insert()) {
            header('Location:' . $_SESSION['url']);
        } else {
            $msg = "Eror al guardar";
            include "view/sign_in.php";
        }
    } else {
        $msg = "Este e-mail ya está registrado, intente con otro.";
        include "view/sign_in.php";
    }
} else {
    $msg = "";
    include "view/sign_in.php";
}
