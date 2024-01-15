<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Cod</th>
            <th data-class="expand"><center>Nombres / Razón Social</center></th>
            <th data-hide="esconder" style="width:5px">Documento</th>
            <th data-hide="esconder" style="width:5px">Número</th>
            <th data-hide="esconder" >Fecha creación</th>
            <th data-hide="esconder" style="width:5px">Ver</th>
        </tr>
    </thead>
    <tbody>
        <?php
         $mes = array(0,'Enero','Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre','Diciembre'); 
            if($dt1){
                foreach ($dt1 as $data): 
                    ?>
                        <tr>
                            <td><?php echo str_pad($data[idclientes], 4, "0", STR_PAD_LEFT) ?></td>
                            <td><?php echo strtoupper($data[cl_nombres]); ?></td>
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
                            <td style="text-align: center;">
                                <?php 
                                    if ($data['cl_fecha_creacion']=='0000-00-00' || !$data['cl_fecha_creacion']) {
                                        ?><i>(No Especificado)</i><?php
                                    }else{
                                        echo date('d',strtotime($data[cl_fecha_creacion])).' de '.$mes[date('n',strtotime($data[cl_fecha_creacion]))].'.';
                                    }
                                ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <a title="Ver detalles del cliente" style="width:45px" class="btn btn-default btn-xs" onclick="vAjax('clientes','mod2',<?php echo $data[idclientes] ?>,'modal1');">
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
