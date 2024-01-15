<table class="table table-striped table-bordered table-hover" id="dtable80" width="100%">
    <thead>
        <tr>
            <th style="width:5px"><img src="<?php echo __REC__ ?>img/sunat.png"></th>
            <th style="width:100px"><center>Nro</center></th>
            <th style="width:5px"><center>Fecha</center></th>
            <th style="width:5px"><center>DNI/RUC</center></th>
            <th><center>Consignado</center></th>
            <th style="width:100px"><center>Flete</center></th>
            <th style="width:5px"><center>Estado</center></th>
            <th style="width:5px"><center>Ver</center></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){ $dd=0;
                foreach ($dt1 as $dta1):
                    ?>
                    <tr>
                        <td style="vertical-align: middle;">
                            <?php 
                                if ($dta1['SUNAT']==1) {
                                    ?><a title="Enviado Correctamente" class="btn btn-success btn-xs">
                                        <b>ACEPTADO</b>
                                    </a><?php
                                }elseif ($dta1['SUNAT']==0) {
                                    ?><a title="Pendiente de Envio" class="btn btn-warning btn-xs">
                                        <b>PROCESO</b>
                                    </a><?php
                                }elseif ($dta1['SUNAT']==2) {
                                    ?><a title="Error de Envio" class="btn btn-danger btn-xs">
                                        <b>ERROR</b>
                                    </a><?php
                                }else{
                                    ?><a title="Sunat lo reporto de baja" class="btn btn-danger btn-xs">
                                        <b>DE BAJA</b>
                                    </a><?php
                                }
                            ?>
                        </td>
                        <td style="vertical-align: middle;"><?php echo $dta1['serie'].'-'.$dta1['correlativo'] ?></td>
                        <td style="vertical-align: middle;"><?php echo date('d/m/Y', strtotime($dta1['fechaEmision'])) ?></td>
                        <td style="vertical-align: middle;"><?php echo $dta1['destinoDoc'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $dta1['destinoNombre'] ?></td>
                        <td style="vertical-align: middle; text-align: right;">
                            S/.<?php echo number_format($dta1['flete'], 2) ?></td>
                        </td>
                        <td>
                            <?php 
                                if ($dta1['facturado']) {
                                    ?><a class="btn btn-success btn-xs">
                                        <b>Facturado</b>
                                    </a><?php
                                }else{
                                    ?><a class="btn btn-danger btn-xs">
                                        <b>Pendiente</b>
                                    </a><?php
                                }
                            ?>
                        </td>
                        <td style="vertical-align: middle;">
                            <div class="btn-group">
                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-file-text-o"></i> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" style="left: -110px;">
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('reportes-guias','vComp',<?php echo $dta1['id'] ?>,'modal1')"><i class="fa fa-edit"></i> Ver/Editar</a>
                                    </li>
                                    <?php 
                                        if ($dta1['SUNAT']==0) {
                                            ?>
                                                <li>
                                                    <a href="javascript:void(0);" onclick="confir('Confirmación',' <i>¿Deseas eliminar la guia: [ <?php echo $dta1['serie'].'-'.$dta1['correlativo'] ?> ] ?</i>','reportes-guias','delGuia',<?php echo $dta1['id'] ?>);"><i class="fa fa-remove"></i> Eliminar</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" onclick="vAjax('facturacion','vPrint',3601,'alerta')">Enviar a Sunat</a>
                                                </li>
                                            <?php
                                        }
                                    ?>                                
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
<script type="text/javascript">table(80,400);$('#tdet').html('<?php echo number_format($dd,2) ?>');</script> 