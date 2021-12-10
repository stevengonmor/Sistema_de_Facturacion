<?php

include_once "model/user.php";
if ($_POST) {
    if (!$_POST['password']) {
        $password = "old";
    } else {
        $password = $_POST['password'];
    }
    if (!empty($_FILES["new_picture"]["name"])) {
        $file = basename($_FILES["new_picture"]["name"]);
        $type = pathinfo($file, PATHINFO_EXTENSION);
        $allowed = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array(strtolower($type), $allowed)) {
            $profile_picture = $_FILES["new_picture"]["tmp_name"];
            $img_string = addslashes(file_get_contents($profile_picture));
        } else {
            $img_string = "old";
            $msg = "No se guardó la foto, formato inválido.";
        }
    } else {
        $img_string = "old";
    }
    $new_user = new User();
    if(isset($_GET['id'])){
        $user = $new_user->select($_GET['id']);  
    }else{
        $user = $new_user->select($_SESSION['id']);
    }
    if ($user->update(addslashes($_POST['name']), addslashes($_POST['about_me']), addslashes($_POST['email']), $password, $img_string)) {
        $header_user = $user->select($_SESSION['id']);
        $_SESSION['name'] = $header_user->name;
        $_SESSION['profile_picture'] = $header_user->profile_picture;
        $_SESSION['name'] = $header_user->name;
        header('Location:' . $_SESSION['url']);
        include "controller/read_user.php";
    } else {
        $msg = "Eror al actualizar";
        include "view/update_user.php";
    }
} else {
    $current_user = new User();
    if(isset($_GET['id'])){
        $user = $current_user->select($_GET['id']);  
    }else{
        $user = $current_user->select($_SESSION['id']);
    }
    include "view/update_user.php";
}
