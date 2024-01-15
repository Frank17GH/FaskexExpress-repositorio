<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%" style="font-size: 11px">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Cod</th>
            <th data-hide="esconder" style="width:5px">Giro</th>
            <th data-class="expand">Abreviatura</th>
            <th data-hide="esconder">Direccion</th>
            <th data-hide="esconder" style="width: 5px">Ubicación</th>
            <th data-hide="esconder" style="width: 5px">Fact.</th>
            <th data-hide="esconder" style="width: 5px">Bol.</th>
            <th data-hide="esconder" style="width: 5px">N/C</th>
            <th data-hide="esconder" style="width: 5px">N/D</th>
            <th data-hide="esconder" style="width: 5px">Guia</th>
            <th data-hide="esconder" style="width:5px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                foreach ($dt1 as $data): ?>
                    <tr>
                        <td><?php echo ($data[lo_codigo])?$data[lo_codigo]:'<i>N/E</i>'; ?></td>
                        <td><span class="label label-<?php echo $data[gi_color]; ?> "><?php echo mb_strtoupper($data[gi_nombre]); ?></span></td>
                        <td><?php echo mb_strtoupper($data[lo_abreviatura]); ?></td>
                        <td><?php echo ($data[lo_direccion])?mb_strtoupper($data[lo_direccion]):'<i>No Especificado</i>'; ?></td>
                        <td><?php echo ($data[nom])?utf8_encode($data[nom]):'<i>N/E</i>'; ?></td>
                        <td><?php echo ($data[fact])?$data[fact]:'<i class="fa fa-times txt-color-red"></i>'; ?></td>
                        <td><?php echo ($data[bol])?$data[bol]:'<i class="fa fa-times txt-color-red"></i>'; ?></td>
                        <td><?php echo ($data[cred])?$data[cred]:'<i class="fa fa-times txt-color-red"></i>'; ?></td>
                        <td><?php echo ($data[deb])?$data[deb]:'<i class="fa fa-times txt-color-red"></i>'; ?></td>
                        <td><?php echo ($data[guia])?$data[guia]:'<i class="fa fa-times txt-color-red"></i>'; ?></td>
                        <td style="vertical-align: middle;">
                            
                            <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-cog fa-lg"></i> Configurar
                                </button>
                                <ul class="dropdown-menu dropdown-menu-xs pull-right">
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('configuracion-general','mod2',<?php echo $data[idlocales]; ?>,'modal1')"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> 
                                            <u>V</u>er información</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('configuracion-general','mod5','<?php echo $data[idlocales] ?>-/<?php echo $data[idgiros] ?>','modal1')"><i class="fa fa-clipboard fa-lg fa-fw txt-color-green"></i> 
                                            <u>A</u>signar Series</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="confir('Eliminacion','¿Seguro que deseas eliminar el local seleccionado?','configuracion-general','del1',<?php echo $data[idlocales] ?>,'remove');"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> 
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
<script type="text/javascript"> table(1,50,1); </script> 