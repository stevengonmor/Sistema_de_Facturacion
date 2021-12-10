<?php

$_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include_once 'model/user.php';
if ($_POST) {
    $search_user = new User(0, "", "", addslashes($_POST['email']));
    if ($search_user->email_exists(addslashes($_POST['email']))) {
        $user = $search_user->select();
        $current_id = $user->get_id();
    } else {
        $msg = "El usuario no existe.";
        $user = $search_user->select($_GET['current_id']);
        $current_id = $_GET['current_id'];
    }
} else if (isset($_GET['id']) || isset($_SESSION['id'])) {
    $new_user = new User();
    if (isset($_GET['id'])) {
        if (!$new_user->id_exists($_GET['id'])) {
            $msg = "El usuario no existe.";
        } else {
            $user = $new_user->select($_GET['id']);
            $current_id = $_GET['id'];
        }
    } else {
        $user = $new_user->select($_SESSION['id']);
        $current_id = $_SESSION['id'];
    }
}
include 'view/user_profile.php';

