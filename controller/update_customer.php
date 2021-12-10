<?php

include_once "model/customer.php";
if ($_POST) {
    $new_customer = new Customer();
    $customer = $new_customer->select($_GET['id']); //enviar la variable desde la vista
    if ($customer->update(addslashes($_POST['ced']),addslashes($_POST['name']), addslashes($_POST['email']), addslashes($_POST['phone']))) {
        $customer = new customer();
        $customers = $customer->selectAll();
        if (!$customers) {
            $msg = "No hay clientes";
        }
        include "view/customers.php";
        //header('Location:' . $_SESSION['url']);
        //include "controller/read_customer.php";
    } else {
        $msg = "Eror al actualizar";
        include "view/update_customer.php";
    }
} else {
    $current_customer = new Customer();
    $customer = $current_customer->select($_GET['id']); //enviar la variable desde la vista
    include "view/update_customer.php";
}