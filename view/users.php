<div class="container-fluid full-screen">
<div class="row description margin-top-space col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">    
<p> <?php $user->count_cashiers() ?></p> 
<?php if($user->count_cashiers() < 5) { ?>    
<a class="offset-5" href="?c=sign_in"  title="Registrar Cajero"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"> Rgistrar Usuario</i></button></a>            
<?php } ?>
<div class= "content-element col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <br><table id="data-table" class="table table-condensed table-hover table-striped">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Rol</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>
            </thead>
            <?php foreach ($users as $user) { ?>       
                <tr>
                    <td><?php echo $user->get_id()?></td>
                    <td><a href="?c=read_user&id=<?php echo $user->get_id()?>"><?php echo $user->name?></a></td>
                    <td><?php echo $user->email?></td>
                    <?php if($user->rol) { ?>    
                    <td>Admin</td>
                    <?php } else { ?>
                    <td>Cajero</td>
                    <?php } ?>
                    <td><a href="?c=update_user&id=<?php echo $user->get_id()?>" title="Editar"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a></td>
                    <?php if(!$user->rol) { ?>
                    <td><a href="?c=delete_user&id=<?php echo $user->get_id()?>" title="Eliminar"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a></td>
                    <?php } else{ ?>
                        <td>Denegado</td>
                     <?php }?>
                </tr>
            <?php } ?>
            </table>
            </div>
        </div>
        </div>