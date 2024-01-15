<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:80px">Placa</th>
            <th data-hide="esconder" style="width:5px">Marca</th>
            <th data-hide="esconder" style="width:5px">Modelo</th>
            <th data-class="expand"><center>Conductor</center></th>
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
                            <td>
                                <div class="well well-sm bg-color-white txt-color-black text-center" style="    padding: 4px;">
                                    <font><b><?php echo strtoupper($data[ve_placa]); ?></b></font>
                                </div>
                            </td>
                            <td style="vertical-align: middle;"><?php echo $data[ve_marca]; ?></td>
                            <td style="vertical-align: middle;"><?php echo $data[ve_modelo]; ?></td>
                            <td style="vertical-align: middle;"><?php echo mb_strtoupper($data[pers]); ?></td>
                           
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
                                            <a href="javascript:void(0);" onclick="vAjax('rutas','mod2',<?php echo $data[idrutas] ?>,'modal1');"><i class="fa fa-refresh fa-lg fa-fw txt-color-darken"></i> 
                                                <u>V</u>er detalles</a>
                                        </li>
                                        <li class="vdt3" style="display: ">
                                            <a href="javascript:void(0);" onclick="confir('Eliminacion','¿Seguro que deseas eliminar la ruta seleccionada?','rutas','del1',<?php echo $data[idrutas] ?>,'remove')"><i class="fa fa-remove fa-lg fa-fw txt-color-red"></i> 
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
