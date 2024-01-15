<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Estado</th>
            <th data-hide="esconder" style="width:5px">Fecha Apertura</th>
            <th data-hide="esconder" style="width:5px">Fecha Cierre</th>
            <th data-class="expand"><center>Usuario</center></th>
            <th data-hide="esconder" style="width:5px">Egresos</th>
            <th data-hide="esconder" style="width:5px">Ingresos</th>
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
                            <td style="text-align: center;" id="vp<?php echo $data['idcomprobante'] ?>">
                                <?php 
                                    if ($data['estado']) {
                                        ?>
                                            <a title="<?php echo $data['lo_abreviatura']; ?>" class="btn btn-primary btn-xs">
                                                <i class="fa fa-check"></i> <b>ACTIVO</b>
                                            </a>
                                        <?php
                                    }else{
                                        ?>
                                            <a title="Enviado Correctamente" class="btn btn-success btn-xs">
                                                <i class="fa fa-ban"></i> <b>CERRADO</b>
                                            </a>
                                        <?php
                                    }
                                    
                                ?>
                            </td>
                            <td>
                                <span class="label bg-color-white" style="color: #000"><?php echo date('d/m/Y H:i',strtotime($data['ca_fecha'])); ?></span>
                            </td>
                              <td>
                                <?php 
                                    if ($data['estado']) {
                                        ?>
                                            <center>-</center>
                                        <?php
                                    }else{
                                        ?>
                                            <span class="label bg-color-white" style="color: #000"><?php echo date('d/m/Y H:i',strtotime($data['ca_cierre'])); ?></span>
                                        <?php
                                    }
                                    
                                ?>

                                
                            </td>
                            <td><?php echo $data['nom']; ?></td>
                            <td style="text-align: right;">
                                <span class="label bg-color-white" style="color: red">S/. <?php echo number_format($data['egre'],2); ?></span>
                            </td>
                            <td style="text-align: right;">
                                <span class="label bg-color-white" style="color: green">S/. <?php echo number_format($data['ingre'],2); ?></span>
                            </td>
                            <td style="text-align: right;">
                                <span class="label bg-color-white" style="color: black">S/. <?php echo number_format($data['ingre']+$data['vent']-$data['egre'],2); ?></span>
                            </td>
                            <td style="vertical-align: middle;">
                                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-sort-down fa-lg"></i> Acciones
                                </button>
                                <ul class="dropdown-menu dropdown-menu-xs pull-right">
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('facturacion','mod2',<?php echo $data['idcomprobante'] ?>,'modal')"><i class="fa fa-file fa-lg fa-fw txt-color-darken"></i> 
                                            <u>I</u>mprimir</a>
                                    </li>
                                    <?php 
                                        if ($data['co_tipo']!='02') {
                                            $ser=$data['co_serie'].'-'.str_pad($data['co_correlativo'], 6, "0", STR_PAD_LEFT);
                                            $comp2=$data['idcomprobante'].'-/'.$ser.'-/'.$data['co_fecha'];
                                            ?>
                                                <li style="display:">
                                                    <a href="javascript:void(0);" onclick="vAjax('reportes-caja','mod1',<?php echo $data['idcaja'] ?>,'modal3')"><i class="fa fa-download fa-lg fa-fw txt-color-pink"></i> 
                                                        <u>V</u>er detalles</a>
                                                </li>
                                                <li style="display: ">
                                                    <a href="javascript:void(0);" onclick="vAjax('reportes-ventas','mod1','<?php echo $comp2; ?>','modal')"><i class="fa fa-envelope fa-lg fa-fw txt-color-orange"></i> 
                                                        <u>E</u>nviar al correo</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" onclick="vAjax('reportes-ventas','mod2','<?php echo $data['idcomprobante'] ?>-/<?php echo $ser;?>','modal')"><i class="fa fa-link fa-lg fa-fw txt-color-blue"></i> 
                                                        <u>O</u>tener link</a>
                                                </li>
                                                <li id="env<?php echo $data['idcomprobante'] ?>" style="display: <?php if ($data['co_SUNAT']==1) {echo 'none';}  ?>">
                                                    <a href="javascript:void(0);" onclick="Envi(<?php echo $data['idcomprobante'] ?>)"><i class="fa fa-upload fa-lg fa-fw txt-color-green"></i> 
                                                        <u>E</u>nviar a SUNAT</a>
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
<script>table(1,50,1);</script> 
