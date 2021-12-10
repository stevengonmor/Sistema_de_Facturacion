<div class="container-fluid full-screen row"> 
    <div class="description content-element col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-4">                   
        <br>
        <h3>Actualizar Información de Usuario</h3>
        <?php if (isset($msg)) { ?> 
            <h6 class ="mb-4"><?php echo $msg ?></h6>
        <?php } ?>  
        <?php if (isset($_GET['id'])) {?>
        <form method="POST" action="./?c=update_user&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
        <?php } else {?>
        <form method="POST" action="./?c=update_user" enctype="multipart/form-data">
        <?php }?>
            <div class="form-group">
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-user"></i>
                <input class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="name" value="<?php echo $user->name ?>">
            </div>
            <div class="form-control soft-blue-background">
                <i aria-hidden="true" class="icon-padding fa fa-user"></i>
                <textarea class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="about_me"><?php echo $user->about_me ?></textarea>
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-envelope"></i>
                <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="email" value="<?php echo $user->email ?>">
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-key"></i>
                <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="password" name="password" placeholder="**************">
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-camera-retro"></i>
                <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="file" name="new_picture">
            </div>
            </div><br>
            <input class= "btn btn-primary" type="submit" value="Actualizar">
        </form>
    </div>
</div> 