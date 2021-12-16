<div class="contaimer-fluid full-screen">
    <div class="row description all-height justify-content-center col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">
        <form method="POST" action='./?c=read_user&current_id=<?php echo $current_id ?>'>
            <div class="form-group">
                <div class="form-control soft-blue-background row">
                <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" type="text" name="email" placeholder="Buscar un usuario (correo electrónico)" required>
                </div>
                <input class= "icon-padding btn btn-primary btn-sm col-xs-12 col-sm-12 col-md-10 col-lg-2 col-xl-2" type="submit" value="Buscar">  
            </div><br>
        </form>
        <?php if (isset($msg)) { ?> 
            <h3 class ="mb-4 "><?php echo $msg ?></h3>
        <?php } else { ?>  
            <div class="profile-pic-back user-profile col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-4">
                <div class="card-block text-center">
                    <img id= "img-box"  alt ="Imagen" src ="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($user->profile_picture); ?>" class="rounded-circle" width="200" height="200"><br>
                    <h3><?php echo $user->name ?></h6>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 col-xl-8">
                <div class="card-block">
                    <div class="col-sm-12">
                        <h3 class="f-w-600">Información</h3>
                        <h6 class=""><?php echo $user->about_me ?></h6><br>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <h3 class="f-w-600">Correo Electrónico</h3>
                            <h6 class=""><?php echo $user->email ?></h6>
                            <br>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <h3 class="f-w-600">Rol</h3>
                            <?php if($user->rol){ ?>
                            <h6 class="">Admin</h6>  
                            <?php } else { ?>
                            <h6 class="">Cajero</h6>
                            <?php } ?>
                        </div>
                        <?php
                            if ($user->get_id() == $_SESSION['id'] || $_SESSION['rol']) {
                                ?>
                                <a href ='?c=update_user&id=<?php echo $user->get_id()?>'  class="btn btn-primary col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-5">Modificar</a>
                        <?php
                            }
                            if ($_SESSION['rol'] && !$user->rol) {
                        ?>                                
                                <a href ='?c=delete_user&id=<?php echo $user->get_id()?>'  class="btn btn-danger offset-2 col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-5">Dar de Baja</a>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?> 
</div>
