<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de Facturacion</title>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--unidad de medida -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet" type ="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php session_start(); ?>
        <div class="container-fluid"> 
            <div class="content-element row">
                <?php if(!isset($_SESSION['id'])){
                    include "controller/log_in.php";
                      } else {
                ?>
                <header>
                    <div id="header-left">
                        <h1 class="col-11 col-sm-11 col-md-11 col-lg-11 col-xl-11">
                            <a href='./?c=read_invoices'> <img class=" col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1" src="./img/logo-goes-here.jpg" alt="Logo"></a>  Sistema de Facturación</h1>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light description">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                            <ul class="navbar-nav">
                            <?php if($_SESSION['rol']){ ?>
                                <li class="nav-item">
                                <a class="tittle active py-0" aria-current="page" href='./?c=read_users'>Usuarios</a>
                                </li>
                            <?php } ?>
                                <li class="nav-item">
                                    <a class="tittle active py-0" aria-current="page" href='./?c=read_invoices'>Facturas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="tittle  active py-0" href='./?c=read_products'>Productos</a>
                                </li>
                                    <li class="nav-item">
                                        <a class="tittle active py-0" href='./?c=read_customers'>Clientes </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class = "tittle" href = '?c=read_user'><?php echo substr($_SESSION['name'], 0, 30) ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="tittle  active py-0" href='?c=log_out_user'><i class="tittle icons-navbar fa fa-sign-out-alt"></i></a>
                                    </li>
                            </ul>
                        </div>
                    </nav>
                </header>
            </div>
            <?php
            if (isset($_GET['c'])) {
                $filename = "controller/{$_GET['c']}.php";
                if (file_exists($filename)) {
                    include_once $filename;
                } else {
                    include 'view/error.php';
                }
            } else {
                include "controller/read_invoices.php";
            }
             if(!isset($output)){
            ?>
            <br><br>
            <div id="content-element">
                <footer class="description text-center">
                    <div class="container-fluid p-4">
                        <section>
                            <h6>¿Necesita ayuda? Visite nuestras páginas de <a href="">ayuda</a></h6>
                        </section>
                    </div>
                    <div class="soft-blue-background text-center">
                        © 2021 Copyright:
                        <a href="">Digite aquí el nombre de su empresa</a>
                    </div><br>
                </footer>
                <?php }?> 
                <?php }?>
            </div>
        </div>
    </body>
</html>