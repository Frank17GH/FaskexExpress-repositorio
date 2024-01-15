<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%" style="font-size: 11px">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Giro</th>
            <th data-class="expand" style="width:5px">Serie</th>
            <th data-hide="esconder" style="width:5px">Doc</th>
            <th data-class="expand"><center>Cliente</center></th>
            <th data-hide="esconder" style="width:5px">Fecha</th>
            <th data-hide="esconder" style="width:5px"></th>
            <th data-class="expand" style="width:5px">Total</th>
            <th data-hide="esconder" style="width:5px">Ver</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                foreach ($dt1 as $data): 
                    ?>
                        <tr>
                            <td>
                                <span class="label label-<?php echo $data[gi_color] ?> "><?php echo $data[gi_nombre] ?></span>
                            </td>
                            <td><span class="label bg-color-white" style="color: #000"><?php echo 'CT01-'.str_pad($data['idcotizacion'], 8, "0", STR_PAD_LEFT); ?></span></td>
                            <td><?php echo $data['cl_numdoc']; ?></td>
                            <td><?php echo $data['cl_nombres']; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($data['co_fecha']));?></td>
                            <td style="text-align: center;">S/.</td>
                            <td style="text-align: right;"><?php echo number_format($data['co_total'],2); ?></td>
                            <td style="vertical-align: middle;">
                                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-sort-down fa-lg"></i> Acciones
                                </button>
                                <ul class="dropdown-menu dropdown-menu-xs pull-right">
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('cotizacion','mod1',<?php echo $data['idcotizacion'] ?>,'modal1');"><i class="fa fa-file fa-lg fa-fw txt-color-darken"></i> 
                                            <u>V</u>er detalles</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('cotizacion','mod2',<?php echo $data['idcotizacion'] ?>,'modal1');"><i class="fa fa-list-alt fa-lg fa-fw txt-color-greenDark"></i> 
                                            <u>G</u>enerar O / S</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('cotizacion','mod3',<?php echo $data['idcotizacion'] ?>,'modal1');"><i class="fa fa-file-text-o fa-lg fa-fw txt-color-redLight"></i> 
                                            <u>F</u>acturar</a>
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
<script type="text/javascript"> 
    table(1,50,1); 
</script>