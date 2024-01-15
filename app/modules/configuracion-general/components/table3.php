<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable3" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Cod</th>
            <th data-hide="esconder" style="width:5px">Color</th>
            <th data-class="expand">Nombre del Giro</th>
            <th data-hide="esconder" style="width:5px">RUC</th>
            <th data-class="expand" style="width: 5px">Facturador</th>
            <th data-class="expand" style="width: 5px">Facturas</th>
            <th data-class="expand" style="width: 5px">Boletas</th>
            <th data-class="expand" style="width: 5px">Nota_Crédito</th>
            <th data-class="expand" style="width: 5px">Nota_Débito</th>
            <th data-class="expand" style="width: 5px">Guía_Remisión</th>
            <th data-hide="esconder" style="width:5px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                foreach ($dt1 as $data): ?>
                    <tr>
                        <td><?php echo ($data[idgiros])?$data[idgiros]:'<i>N/E</i>'; ?></td>
                        <td><span class="label label-<?php echo $data[gi_color]; ?> ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                        <td><?php echo mb_strtoupper($data[gi_nombre]); ?></td>
                        <td><?php echo $data[gi_ruc] ?></td>
                        <td style="text-align: center; ">
                            <?php 
                                if ($data[version]) {
                                    ?>
                                        <span class="label label-success">PRODUCCIÓN</span>
                                    <?php
                                }else{
                                    ?>
                                        <span class="label label-danger">BETA</span>
                                    <?php
                                }
                                
                            ?>
                        </td>
                        <td style="text-align: center;"><?php echo ($data[fact])?'<i class="fa fa-check txt-color-green"></i>':'<i class="fa fa-times txt-color-red"></i>'; ?></td>
                        <td style="text-align: center;"><?php echo ($data[bol])?'<i class="fa fa-check txt-color-green"></i>':'<i class="fa fa-times txt-color-red"></i>'; ?></td>
                        <td style="text-align: center;"><?php echo ($data[cred])?'<i class="fa fa-check txt-color-green"></i>':'<i class="fa fa-times txt-color-red"></i>'; ?></td>
                        <td style="text-align: center;"><?php echo ($data[deb])?'<i class="fa fa-check txt-color-green"></i>':'<i class="fa fa-times txt-color-red"></i>'; ?></td>
                        <td style="text-align: center;"><?php echo ($data[guia])?'<i class="fa fa-check txt-color-green"></i>':'<i class="fa fa-times txt-color-red"></i>'; ?></td>
                        <td style="vertical-align: middle;">
                            
                            <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-cog fa-lg"></i> Configurar
                                </button>
                                <ul class="dropdown-menu dropdown-menu-xs pull-right">
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('configuracion-general','mod6',<?php echo $data[idgiros]; ?>,'modal1')"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> 
                                            <u>V</u>er información</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('configuracion-general','mod4',<?php echo $data[idgiros]; ?>,'modal1')"><i class="fa fa-files-o fa-lg fa-fw txt-color-pink"></i> 
                                            <u>A</u>signar CPE</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="confir('Eliminacion','¿Seguro que deseas eliminar el giro seleccionado?','configuracion-general','del1',<?php echo $data[idgiros] ?>,'remove');"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> 
                                            <u>E</u>liminar Local</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="text-align-center">
                                        <a href="javascript:void(0);">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; 
            }
        ?>
    </tbody>
</table>
<script> table(3,50,1); </script> 