<div class="container-fluid full-screen row"> 
    <div class="description content-element col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-4">                   
        <br>
        <h3>Registro de Cliente</h3>
        <?php if ($msg) { ?> 
            <h6 class ="mb-4 "><?php echo $msg ?></p>
        <?php } ?>  
        <form method="POST" action="./?c=register_customer">
        <div class="form-group">
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-id-card"></i>
                <input class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="ced" placeholder="Cédula" required>
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-user"></i>
                <input class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="name" placeholder="Nombre Completo" required>
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-envelope"></i>
                <input class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="email" placeholder="E-mail" required>
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-phone"></i>
                <input class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="phone" placeholder="Teléfono" required>
            </div>
            </div><br>
            <input class= "btn btn-primary" type="submit" value="Registrar">
        </form>
    </div>
</div> 