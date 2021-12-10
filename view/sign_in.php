<div class="container-fluid full-screen row"> 
    <div class="description content-element col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-4">                   
        <br>
        <h3>Registro de Usuario</h3>
        <?php if ($msg) { ?> 
            <p class ="text-white mb-4 "><?php echo $msg ?></p>
        <?php } ?>  
        <form method="POST" action="./?c=sign_in" enctype="multipart/form-data">
        <div class="form-group row">   
        <div class="form-control soft-blue-background col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11">
                <i class="icon-padding fa fa-user"></i>
                <input class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="name" placeholder="Nombre Completo" required>
            </div><br>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-envelope"></i>
                <input class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="email" placeholder="Correo Electronico" required>
            </div><br>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-key"></i>
                <input class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="password" name="password" placeholder="Contraseña" required>
            </div><br>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-camera-retro"></i>
                <input class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="file" name="profile_picture" placeholder="Foto de Perfil">
            </div><br>
            <p class="mb-4">La foto de perfil es opcional, puedes agregarla más tarde.</p><br>
            <input class= "btn btn-primary" type="submit" value="Registrar">
            </div>
        </form>
    </div>
</div> 

