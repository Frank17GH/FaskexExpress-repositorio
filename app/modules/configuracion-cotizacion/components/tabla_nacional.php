<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable4" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Cod</th>
            <th data-class="expand"><center>Descripción</center></th>
            <th data-hide="esconder" style="width:5px">Estado</th>
            <th data-hide="esconder" style="width:5px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                foreach ($dt1 as $data): 
                    ?>
                        <tr>
                            <td><?php echo str_pad($data[idreennacional], 6, "0", STR_PAD_LEFT) ?></td>
                            <td><?php echo mb_strtoupper((utf8_encode($data[ren_nombre]))); ?></td>
                            <td>
                                <?php 
                                    if ($data[ren_estado]) {
                                        ?><a class="btn btn-success btn-xs" href="javascript:void(0);">&nbsp;&nbsp;<b>ACTIVO</b>&nbsp;&nbsp;</a><?php
                                    }else{
                                        ?><a class="btn btn-danger btn-xs" href="javascript:void(0);"><b>INACTIVO</b></a><?php
                                    }
                                ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <a title="Ver detalles del cliente" class="btn btn-default btn-xs" onclick="vAjax('configuracion-cotizacion','',<?php echo $data[idreennacional] ?>,'modal5');">
                                       <i class="fa fa-file-text-o"></i> Detalles
                                </a>
                            </td>                           
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript"> table(4,5,0); </script> 
