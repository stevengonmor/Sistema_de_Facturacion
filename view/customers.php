<div class="container-fluid full-screen">
<div class="row description margin-top-space col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">   
<a class="offset-5" href="?c=register_customer"  title="Agregar Cliente"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"> Registrar Cliente</i></button></a>        
<div class= "content-element col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">          
<br><table id="data-table" class="table table-condensed table-hover table-striped">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>E-mail</th>
                <th>Teléfono</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>
            </thead>
            <?php foreach ($customers as $customer) { ?>       
                <tr>
                    <td><?php echo $customer->get_id()?></td>
                    <td><a href="?c=read_customer&id=<?php echo $customer->get_id()?>"><?php echo $customer->name?></a></td>
                    <td><?php echo $customer->get_ced()?></td>
                    <td><?php echo $customer->email?></td>
                    <td><?php echo $customer->phone?></td>
                    <td><a href="?c=update_customer&id=<?php echo $customer->get_id()?>" title="Editar"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a></td>
                    <td><a href="?c=delete_customer&id=<?php echo $customer->get_id()?>" title="Eliminar"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a></td>
                    </tr>
            <?php } ?>
            </table>
            </div>
        </div>
        </div>