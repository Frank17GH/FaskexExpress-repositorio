<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Cód.</th>
            <th data-hide="esconder" style="width:80px">Placa</th>
            <th data-hide="esconder" style="width:5px">Marca</th>
            <th data-hide="esconder" style="width:5px">Modelo</th>
            <th data-class="expand"><center>Conductor</center></th>
            <th data-hide="esconder" style="width:5px">SOAT</th>
            <th data-hide="esconder" style="width:5px">Revisión Técnica</th>
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
                            <td style="vertical-align: middle;"><?php echo str_pad($data[idvehiculos], 6, "0", STR_PAD_LEFT) ?></td>
                            <td>
                                <div class="well well-sm bg-color-white txt-color-black text-center" style="    padding: 4px;">
                                    <font><b><?php echo strtoupper($data[ve_placa]); ?></b></font>
                                </div>
                            </td>
                            <td style="vertical-align: middle;"><?php echo $data[ve_marca]; ?></td>
                            <td style="vertical-align: middle;"><?php echo $data[ve_modelo]; ?></td>
                            <td></td>
                            <td>
                                <?php 
                                    if ($data[soat]) {
                                        if ($data[soat]>date('Y-m-d')) {
                                            ?><span class="label label-success"><?php echo date('d/m/Y', strtotime($data[soat])); ?></span><?php
                                        }else{
                                            ?><span class="label label-danger"><?php echo date('d/m/Y', strtotime($data[soat])); ?></span><?php
                                        }
                                         
                                    }else{
                                        ?><span class="label label-danger">No Encontrado</span><?php
                                    }
                                    
                                ?>
                            </td>
                            <td>
                                 <?php 
                                    if ($data[revision]) {
                                        if ($data[revision]>date('Y-m-d')) {
                                            ?><span class="label label-success"><?php echo date('d/m/Y', strtotime($data[revision])); ?></span><?php
                                        }else{
                                            ?><span class="label label-danger"><?php echo date('d/m/Y', strtotime($data[revision])); ?></span><?php
                                        }
                                         
                                    }else{
                                        ?><span class="label label-danger">No Encontrado</span><?php
                                    }
                                    
                                ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <?php 
                                    if ($data[ve_estado]) {
                                        ?><a class="btn btn-success btn-xs" href="javascript:void(0);">&nbsp;&nbsp;<b>ACTIVO</b>&nbsp;&nbsp;</a><?php
                                    }else{
                                        ?><a class="btn btn-danger btn-xs" href="javascript:void(0);"><b>INACTIVO</b></a><?php
                                    }
                                ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                    <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-sort-down fa-lg"></i> Acciones
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-xs pull-right">
                                        <li>
                                            <a href="javascript:void(0);" onclick="vAjax('vehiculos','mod1',<?php echo $data[idvehiculos] ?>,'modal1');"><i class="fa fa-file-text-o fa-lg fa-fw txt-color-darken"></i> 
                                                <u>V</u>er detalles</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="vAjax('vehiculos','mod4',<?php echo $data[idvehiculos] ?>,'modal4');"><i class="fa fa-wrench fa-lg fa-fw txt-color-darken"></i> 
                                                <u>K</u>m Recorridos</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="vAjax('vehiculos','mod5',<?php echo $data[idvehiculos] ?>,'modal4');"><i class="fa fa-wrench fa-lg fa-fw txt-color-darken"></i> 
                                                <u>M</u>antenimientos</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="vAjax('vehiculos','mod2',<?php echo $data[idvehiculos] ?>,'modal4');"><i class="fa fa-shield fa-lg fa-fw txt-color-red"></i> 
                                                <u>S</u>OAT</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="vAjax('vehiculos','mod3',<?php echo $data[idvehiculos] ?>,'modal4');"><i class="fa fa-wrench fa-lg fa-fw txt-color-darken"></i> 
                                                <u>R</u>evisión técnica</a>
                                        </li>
                                        <li class="vdt3" style="display: ">
                                            <a href="javascript:void(0);" onclick="confir('Eliminacion','¿Seguro que deseas eliminar el vehiculo seleccionado?','vehiculos','del1',<?php echo $data[idvehiculos] ?>,'remove')"><i class="fa fa-remove fa-lg fa-fw txt-color-red"></i> 
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
