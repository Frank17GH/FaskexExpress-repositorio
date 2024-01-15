<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%" style="font-size: 11px">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Estado</th>
            <th data-hide="esconder" style="width:5px">SOAP</th>
            <th data-hide="esconder" style="width:5px">Tipo</th>
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
                    $seriec= $data['co_serie'].'-'.str_pad($data['co_correlativo'], 10, "0", STR_PAD_LEFT);
                    ?>
                        <tr class="<?php if($data['co_anulacion']>0){echo 'danger';} ?>">
                            <td style="text-align: center;" id="vp<?php echo $data['idcomprobante'] ?>">
                                <?php 
                                    if ($data['co_tipo']=='02') {
                                        ?>
                                            <a title="No Tributable" class="btn btn-default btn-xs" style="font-size: 80%">
                                                <i class="fa fa-tag"></i>
                                            </a>
                                        <?php
                                    }else{
                                        if ($data['co_anulacion']==3) {
                                            ?>
                                                <a title="ACEPTADO" class="btn btn-primary btn-xs" style="font-size: 80%">
                                                    <i class="fa fa-check"></i> &nbsp;&nbsp;&nbsp;&nbsp;<b>ACEPTADO</b>&nbsp;&nbsp;&nbsp;&nbsp;
                                                </a>
                                            <?php
                                        }elseif ($data['co_anulacion']==2) {
                                            ?>
                                                <a title="CONTIENE ERRORES" class="btn btn-warning btn-xs" style="font-size: 80%">
                                                    <i class="fa fa-remove"></i>  <b>ERROR</b>
                                                </a>
                                            <?php
                                        }else{
                                            ?>
                                                <a title="REGISTRADO" class="btn btn-success btn-xs" style="font-size: 80%">
                                                    <i class="fa fa-circle-o-notch"></i> <b>REGISTRADO</b>
                                                </a>
                                            <?php
                                        }
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if ($data[co_vers]) {
                                        ?>
                                            <span class="label label-success">Producción</span>
                                        <?php
                                    }else{
                                        ?>
                                            <span class="label label-danger">Beta</span>
                                        <?php
                                    }
                                ?>
                                
                            </td>
                            <td>
                                <span class="label bg-color-white" style="color: #000; font-size: 15px">
                                    <?php 
                                        if ($data[co_tipo]=='01') {
                                            echo 'Factura';
                                        }elseif ($data[co_tipo]=='03') {
                                            echo 'Boleta';
                                        }elseif ($data[co_tipo]=='07') {
                                            echo 'Nota de crédito';
                                        }elseif ($data[co_tipo]=='08') {
                                            echo 'Nota de débito';
                                        }
                                    ?>
                                </span>
                            </td>
                            <td>
                                <span class="label label-<?php echo $data[gi_color] ?> "><?php echo $data[gi_nombre] ?></span>
                            </td>
                            <td><span class="label bg-color-white" style="color: #000"><?php echo $seriec; ?></span></td>
                            <td><?php echo $data['co_ruc_envia']; ?></td>
                            <td><?php echo mb_strtoupper($data['co_nombre_envia']); ?></td>
                            <td><?php echo date("d/m/Y", strtotime($data['co_fecha']));?></td>
                            <td style="text-align: center;">S/.</td>
                            <td style="text-align: right; font-size: 15px"><b><?php echo ($data['co_anulacion']>0)?'0.00':number_format($data['co_total'],2); ?></b></td>
                            <td style="vertical-align: middle;">
                                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-sort-down fa-lg"></i> Acciones
                                </button>
                                <ul class="dropdown-menu dropdown-menu-xs pull-right">
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('facturacion','mod1','0-/<?php echo $data['idcomprobante'] ?>','modal1');"><i class="fa fa-file fa-lg fa-fw txt-color-darken"></i> 
                                            <u>V</u>er detalles</a>
                                    </li>
                                    <?php 
                                        if ($data['co_tipo']!='02') {
                                            $ser=$data['co_serie'].'-'.str_pad($data['co_correlativo'], 6, "0", STR_PAD_LEFT);
                                            $comp2=$data['idcomprobante'].'-/'.$ser.'-/'.$data['co_fecha'];
                                            ?>
                                                <li class="vdt<?php echo $data['idcomprobante'] ?>" style="display: <?php if ($data['co_SUNAT']==0 || $data['co_SUNAT']==2 || $data['co_SUNAT']==3) {echo 'none';}  ?>">
                                                    <a href="javascript:void(0);" onclick="desc(<?php echo $data['idcomprobante'] ?>)"><i class="fa fa-download fa-lg fa-fw txt-color-pink"></i> 
                                                        <u>D</u>escargar XML</a>
                                                </li>
                                                <li class="vdt<?php echo $data['idcomprobante'] ?>" style="display: <?php if ($data['co_SUNAT']==0 || $data['co_SUNAT']==2 || $data['co_SUNAT']==3) {echo 'none';}  ?>">
                                                    <a href="javascript:void(0);" onclick="desc2(<?php echo $data['idcomprobante'] ?>)"><i class="fa fa-download fa-lg fa-fw txt-color-blueLight"></i> 
                                                        <u>D</u>escargar CDR</a>
                                                </li>
                                                <?php 
                                                    if ($data['co_anulacion']==0 && date('Y-m-d')<=date('Y-m-d', strtotime('+3 days '.$data['co_fecha']))) {
                                                        ?>
                                                            <li>
                                                                <a href="javascript:void(0);" onclick="confir('Confirmación','Seguro que deseas eliminar el comprobante <?php echo $seriec; ?>','facturacion','del2',<?php echo $data['idcomprobante'] ?>,'remove');"><i class="fa fa-ban fa-lg fa-fw txt-color-red"></i> 
                                                                    <u>A</u>nular Comprobante</a>
                                                            </li>
                                                        <?php
                                                    }elseif($data['co_anulacion']==1){
                                                         ?>
                                                            <li id="env<?php echo $data['idcomprobante'] ?>">
                                                                <a href="javascript:void(0);" onclick="Envi('2-<?php echo $data['idcomprobante'] ?>')"><i class="fa fa-upload fa-lg fa-fw txt-color-red"></i> 
                                                                    <u>E</u>nviar ANULACION a SUNAT</a>
                                                            </li>
                                                        <?php
                                                    }
                                                ?>
                                                <li id="env<?php echo $data['idcomprobante'] ?>" style="display: <?php if ($data['co_SUNAT']==1 && $data[co_vers]==1) {echo 'none';}  ?>">
                                                    <a href="javascript:void(0);" onclick="Envi('1-<?php echo $data['idcomprobante'] ?>')"><i class="fa fa-upload fa-lg fa-fw txt-color-green"></i> 
                                                        <u>E</u>nviar CPE a SUNAT</a>
                                                </li>
                                            <?php
                                        }
                                    ?>
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