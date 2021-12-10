<div class="container-fluid full-screen row"> 
    <div class="description content-element col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-4">                   
        <br>
        <h3>Inicio de Sesión</h3><br>
        <?php if ($msg) { ?> 
            <h6 class ="mb-4 "><?php echo $msg ?></h6>
        <?php } ?>  
        <form method="POST" action="./?c=log_in" enctype="multipart/form-data">
            <div class="form-group">
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-envelope"></i>
                <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="email" placeholder="Correo Electrónico" required>
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-key"></i>
                <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="password" name="password" placeholder="Contraseña" required>
            </div>
            </div><br>
            <input class= "btn btn-primary" type="submit" value="Ingresar">
        </form>
    </div>
</div> 

