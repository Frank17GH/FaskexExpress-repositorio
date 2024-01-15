<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%" style="font-size: 12px">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Id.</th>
            <th data-class="expand">Servicio</th>
            <th data-hide="esconder">Categoría</th>
            <th data-hide="esconder" style="width: 100px">Precio</th>
            <th data-hide="esconder" style="width:5px">Estado</th>
            <th data-class="expand" style="width:5px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                foreach ($dt1 as $dta): 
                    ?>
                        <tr class="font-sm">
                            <td><?php echo str_pad($dta['idproducto'], 6, "0", STR_PAD_LEFT) ?></td>
                            <td><?php echo mb_strtoupper($dta['pr_nombre']); ?></td>
                            <td><?php echo ($dta[cat])?$dta[cat]:'<i>No especificado</i>'; ?></td>
                            <td style="text-align: right;"><?php echo number_format($dta[pr_costo],2); ?></td>
                            <td>
                                <?php 
                                    if ($dta[pr_estado]) {
                                      ?>
                                          <span class="label label-success">Activo</span>
                                      <?php
                                    }else{
                                      ?>
                                          <span class="label label-danger">Inactivo</span>
                                      <?php
                                    }
                                ?>
                            </td>
                            <td style="width: 5px;">
                                <a class="btn btn-info btn-xs" href="javascript:void(0);" onclick="vAjax('servicios','mod1',<?php echo $dta['idproducto'] ?>,'modal1');"><i class="fa fa-pencil"></i> Editar</a>
                            </td>
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript"> table(1,50,1); </script> 
