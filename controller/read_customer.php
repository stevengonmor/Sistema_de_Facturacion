<?php

$_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include_once 'model/customer.php';
if ($_POST) {
    $search_customer = new customer(0, 0, "", addslashes($_POST['email']),0);
    if ($search_customer->email_exists(addslashes($_POST['email']))) {
        $customer = $search_customer->select();
        $current_id = $customer->get_id();
    } else {
        $msg = "El cliente no existe.";
        $customer = $search_customer->select($_GET['current_id']);
        $current_id = $_GET['current_id'];
    }
} else if (isset($_GET['id']) || isset($_SESSION['id'])) {
    $new_customer = new customer();
    if (isset($_GET['id'])) {
        if (!$new_customer->id_exists($_GET['id'])) {
            $msg = "El cliente no existe.";
        } else {
            $customer = $new_customer->select($_GET['id']);
            $current_id = $_GET['id'];
        }
    } else {
        $customer = $new_customer->select($_SESSION['id']);
        $current_id = $_SESSION['id'];
    }
}
include_once "model/invoice.php";
$invoice = new Invoice();
$invoices = $invoice->selectReportByClient($customer->get_id());
if ($invoices) {
    $invoices_validation = "Facturas de " . $customer->name;
} else {
    $invoices_validation = $customer->name . " no tiene facturas.";
}
include 'view/customer.php';