<div class="container-fluid full-screen row"> 
    <div class="description content-element col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-4">                   
        <br>
        <h3>Actualizar Información de Cliente</h3>
        <?php if (isset($msg)) { ?> 
            <h6 class ="mb-4"><?php echo $msg ?></h6>
        <?php } ?>  
        <form method="POST" action="./?c=update_customer&id=<?php echo $customer->get_id() ?>">
            <div class="form-group">
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-id-card"></i>
                <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="ced" value="<?php echo $customer->get_ced() ?>">
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-user"></i>
                <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="name" value="<?php echo $customer->name ?>">
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-envelope"></i>
                <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="email" value="<?php echo $customer->email ?>">
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-phone"></i>
                <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="phone" value="<?php echo $customer->phone ?>">
            </div>
            </div><br>
            <input class= "btn btn-primary" type="submit" value="Actualizar">
        </form>
    </div>
</div> 