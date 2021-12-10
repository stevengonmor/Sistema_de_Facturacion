<?php

if ($_POST) {
    include "model/customer.php";
    $validation_customer = new Customer();
    if (!$validation_customer->email_exists(addslashes($_POST['email']))) {
        $new_customer = new Customer(0, addslashes($_POST['ced']),addslashes($_POST['name']), addslashes($_POST['email']), addslashes($_POST['phone']));
        if ($new_customer->insert()) {
            $customer = new customer();
            $customers = $customer->selectAll();
            if (!$customers) {
                $msg = "No hay clientes";
            }
            include 'view/customers.php';
            //header('Location:' . $_SESSION['url']);
        } else {
            $msg = "Eror al guardar";
            include "view/register_customer.php";
        }
    } else {
        $msg = "Este e-mail ya está registrado, intente con otro.";
        include "view/register_customer.php";
    }
} else {
    $msg = "";
    include "view/register_customer.php";
}