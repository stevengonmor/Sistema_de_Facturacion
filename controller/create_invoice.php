<?php

if ($_POST) {
    include "model/invoice.php";
    include "model/invoice_detail.php";
    $new_invoice = new invoice(0, $_POST['cashier_id'],  $_POST['customer_id'], $_POST['customer_ced'], addslashes($_POST['customer_name']),
    $_POST['customer_phone'], addslashes($_POST['customer_email']), 0,  $_POST['subTotal'], $_POST['totalAftertax'], $_POST['taxAmount']);
    if ($new_invoice->insert()) {
        $invoice = new invoice();
        $created_invoice = new invoice();
        $created_invoice = $invoice->get_last_order_id();
        $or_id = $created_invoice->order_id;
        $detail = $_POST['numDetail'];
        for($i = 1; $i < $detail; $i++) {
            $new_invoice_detail = new invoice_detail($or_id, $_POST['productid_'.$i],
            $_POST['productname_'.$i], $_POST['quantity_'.$i], $_POST['price_'.$i], $_POST['total_'.$i]);
            $new_invoice_detail->insert();
        }
        $invoices = $invoice->selectAll();
        $msg = "";
        if(!$invoices) {
            $msg = "No hay facturas";
        }
        include "view/invoices.php";
    } else {
        $msg = "Error al guardar";
        include "view/create_invoice.php";
    }
} else {
    include "view/create_invoice.php";
}