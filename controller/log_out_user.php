<?php
session_destroy();
$_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/Sistema_de_Facturacion/";
header('Location: '.$_SESSION['url']);
