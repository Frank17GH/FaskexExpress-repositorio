<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Cod</th>
            <th data-class="expand"><center>Nombres de Asiento</center></th>
            <th data-hide="esconder" style="width:5px">Categoría</th>
            <th data-hide="esconder" style="width:5px">Estado</th>
            <th data-hide="esconder" style="width:5px">Ver</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                foreach ($dt1 as $dta1): 
                    ?>
                        <tr>
                            <td><?php echo str_pad($dta1[idasiento], 4, "0", STR_PAD_LEFT) ?></td>
                            <td><?php echo strtoupper($dta1[as_descripcion]); ?></td>
                            <td>
                                <?php echo $dta1[ca_descripcion]; ?></td>
                            </td>
                            <td>
                                <?php 
                                    if ($dta1[as_estado]) {
                                        ?>
                                            <span class="label label-success">ACTIVO</span>
                                        <?php
                                    }else{
                                        ?>
                                            <span class="label label-danger">INACTIVO</span>
                                        <?php
                                    }
                                ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <a title="Ver detalles del cliente" style="width:45px" class="btn btn-default btn-xs" onclick="vAjax('finanzas_conf','mod2',<?php echo $dta1[idasiento] ?>,'modal1');">
                                       <i class="fa fa-file-text-o"></i>
                                </a>
                            </td>

                           
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript"> table(1,50,1); </script> 
