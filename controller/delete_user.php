<?php

include 'model/user.php';
$user = new User();
    if ($user->delete($_GET['id'])) {
        $user = new User();
        $users = $user->selectAll();
    include 'view/users.php';
    } else {
        include 'view/error.php';
    }


