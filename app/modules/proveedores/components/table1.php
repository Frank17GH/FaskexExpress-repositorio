<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Cod</th>
            <th data-class="expand"><center>Nombres / Razón Social</center></th>
            <th data-hide="esconder" style="width:5px">Documento</th>
            <th data-hide="esconder" style="width:5px">Número</th>
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
                            <td><?php echo str_pad($data[idclientes], 6, "0", STR_PAD_LEFT) ?></td>
                            <td><?php echo mb_strtoupper($data[cl_nombres])?></td>
                            <td>
                                <center>
                                    <?php 
                                        if ($data[cl_tipodoc]==1) {
                                            echo 'D.N.I.';
                                        }elseif ($data[cl_tipodoc]==6) {
                                            echo 'R.U.C.';
                                        }
                                     ?> 
                                </center>
                                
                            </td>
                            <td><?php echo $data[cl_numdoc]; ?></td>
                            <td>
                                <?php 
                                    if ($data[cl_estado]) {
                                        ?><a class="btn btn-success btn-xs" href="javascript:void(0);">&nbsp;&nbsp;<b>ACTIVO</b>&nbsp;&nbsp;</a><?php
                                    }else{
                                        ?><a class="btn btn-danger btn-xs" href="javascript:void(0);"><b>INACTIVO</b></a><?php
                                    }
                                ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <a title="Ver detalles del cliente" class="btn btn-default btn-xs" onclick="vAjax('proveedores','mod2',<?php echo $data[idclientes] ?>,'modal5');">
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
<script type="text/javascript"> table(1,50,1); </script> 
