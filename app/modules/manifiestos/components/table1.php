<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:90px">Serie</th>
            <th data-hide="esconder" style="width:5px">Fecha</th>
            <th data-class="expand" >Partida</th>
            <th data-hide="esconder" >Destino</th>
            <th data-class="expand"><center>Conductor</center></th>
            <th data-hide="esconder" style="width:80px">Placa</th>
            <th data-class="expand" style="width:5px">Usuario</th>
            <th data-class="expand" style="width:5px">Estado</th>
            <th data-hide="esconder" style="width:5px">Acc.</th>
        </tr>
    </thead>
    <tbody style="font-size: 11px">
        <?php 
            if($dt1){
                foreach ($dt1 as $data): 
                    ?>
                        <tr class="<?php if($data[ma_estado]==2){echo 'warning';}elseif($data[ma_estado]==3){echo 'success';}else{echo 'danger';} ?>">
                            <td><?php echo 'M-'.str_pad($data[idmanifiestos], 8, "0", STR_PAD_LEFT); ?></td>
                            <td><?php echo date('d/m/Y',strtotime($data[fecha_envio])); ?></td>
                            <?php 
                                $class = new Mod(); 
                                $part= $class->sel7($data[ma_origen]);
                                $class = new Mod(); 
                                $dest= $class->sel7($data[ma_destino]);
                             ?>
                            <td><?php echo mb_strtoupper(utf8_encode($part[0][ub])); ?></td>
                            <td><?php echo mb_strtoupper(utf8_encode($dest[0][ub])); ?></td>
                            <td><?php echo mb_strtoupper(utf8_encode($data[nom])); ?></td>
                            <td><?php echo mb_strtoupper(utf8_encode($data[ve_placa])); ?></td>
                            <td><?php echo mb_strtoupper(utf8_encode($data[user])); ?></td>
                            <td>
                                <?php 
                                    switch ($data[ma_estado]) {
                                        case 1:
                                            ?><span class="label label-danger" style="font-size: 100%"><i class="fa fa-warning"></i> Por Cargar</span><?php
                                            break;
                                        case 2:
                                            ?><span class="label label-warning" style="font-size: 100%">&nbsp;&nbsp;<i class="fa fa-road"></i> En Ruta&nbsp;&nbsp;</span><?php
                                            break;
                                        case 3:
                                            ?><span class="label label-success" style="font-size: 100%"><i class="fa fa-database"></i> En Agencia</span><?php
                                            break;
                                    }
                                ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-sort-down fa-lg"></i> Acciones
                                </button>
                                <ul class="dropdown-menu dropdown-menu-xs pull-right">
                                    <?php 
                                        if ($data[ma_estado]==1 && $data[ma_origen]==$_SESSION[fasklog][local_pre]) {
                                            ?>
                                                <li class="vdt<?php echo $data['idcomprobante'] ?>">
                                                    <a href="javascript:void(0);" onclick="vAjax('manifiestos','mod2',<?php echo $data['idmanifiestos'] ?>,'modal4')"><i class="fa fa-check fa-lg fa-fw txt-color-green"></i> 
                                                    <u>V</u>erificar Carga</a>
                                                </li>
                                            <?php
                                        }else{
                                            if ($data[ma_estado]==2 && $data[ma_destino]==$_SESSION[fasklog][local_pre]) {
                                                ?>
                                                    <li class="vdt<?php echo $data['idcomprobante'] ?>">
                                                        <a href="javascript:void(0);" onclick="vAjax('manifiestos','mod2',<?php echo $data['idmanifiestos'] ?>,'modal4')"><i class="fa fa-check fa-lg fa-fw txt-color-green"></i> 
                                                        <u>V</u>erificar Carga</a>
                                                    </li>
                                                <?php
                                            }
                                        }
                                    ?>
                                    
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('manifiestos','print',<?php echo $data['idmanifiestos'] ?>,'modal')"><i class="fa fa-print fa-lg fa-fw txt-color-blue"></i> 
                                            <u>I</u>mprimir Manifiesto</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('manifiestos','print',<?php echo $data['idmanifiestos'] ?>,'modal')"><i class="fa fa-print fa-lg fa-fw txt-color-red"></i> 
                                            <u>E</u>ntrega Domicilio</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('manifiestos','print',<?php echo $data['idmanifiestos'] ?>,'modal')"><i class="fa fa-print fa-lg fa-fw txt-color-yellow"></i> 
                                            <u>E</u>ntrega Agencia</a>
                                    </li>
                                    <li id="env<?php echo $data['idcomprobante'] ?>" style="display: <?php if ($data[co_SUNAT]==1) {echo 'none';}  ?>">
                                        <a href="javascript:void(0);" onclick="confir('Eliminacion','¿Seguro que deseas eliminar el manifiesto seleccionado?','manifiestos','del1',<?php echo $data[idmanifiestos] ?>,'remove');"><i class="fa fa-remove fa-lg fa-fw txt-color-red"></i> 
                                        <u>E</u>liminar</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="text-align-center">
                                        <a href="javascript:void(0);">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                            </td>
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript"> table(1,50,1); </script> 