<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Id.</th>
            <th data-class="expand">Descripción</th>
            <th data-hide="esconder" style="width: 80px">Prod / Serv</th>
            <th data-hide="esconder" style="width: 5px">Tipo</th>
            <th data-hide="esconder" style="width: 5px">Estado</th>
            <th data-class="expand" style="width:5px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                foreach ($dt1 as $dta): 
                    ?>
                        <tr class="font-sm" id="tr_<?php echo $dta['idcategoria'] ?>">
                            <td><?php echo str_pad($dta['idcategoria'], 6, "0", STR_PAD_LEFT) ?></td>
                            <td><?php echo $dta['ca_nombre']; ?></td>
                            <td style="text-align: center;"><?php echo $dta['cant']; ?></td>
                            <td style="text-align: center;"><?php echo ($dta['ca_tipo'])?'SERVICIOS':'PRODUCTOS'; ?></td>
                            <td>
                                <?php 
                                    if ($dta['ca_estado']) {
                                        ?><span class="label label-success">Activo</span><?php
                                    }else{
                                        ?><span class="label label-danger">Inactivo</span><?php
                                    }
                                ?>
                            </td>
                            <td style="width: 5px;">
                               <table>
                                   <tr>
                                       <td>
                                           <a class="btn btn-info btn-xs" href="javascript:void(0);" onclick="vAjax('productos-categorias','mod2',<?php echo $dta['idcategoria'] ?>,'modal1');"><i class="fa fa-pencil"></i></a>
                                       </td>
                                       <td>
                                           <a class="btn btn-danger btn-xs" onclick="confir('Confirmacion!','<i class=\'fa fa-clock-o\'></i> <i>¿Deseas eliminar la categoria con id: #<?php echo str_pad($dta['idcategoria'], 6, "0", STR_PAD_LEFT) ?> ?</i>','productos-categorias','del1',<?php echo $dta['idcategoria'] ?>,'times');" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                       </td>
                                   </tr>
                               </table>
                            </td>

                           
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript"> table(1,50,1); </script> 
