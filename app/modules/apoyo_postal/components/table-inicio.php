<table class="table table-striped table-bordered table-hover" id="dtable2" width="100%">
        <thead>
            <tr>
                <th data-hide="esconder" style="width:5px">Estado</th>
                <th data-class="expand"  style="width:100px" ><center>Orden</center></th>
                <th data-hide="esconder" style="width:100px">Cotizacion</th>
                <th data-hide="esconder" style="width:100px">Fecha-Registro</th>
                <th data-hide="esconder" style="width:100px">Fecha-Inicio</th>
                <th data-hide="esconder" style="width:100px">Fecha-Vencimiento</th>
                <th data-class="expand" > Cliente</th> 
                <th data-class="expand" > Para despacho</th>
                 
                <th data-hide="esconder" style="width:50px">Acc.</th>
            </tr>
        </thead>
        <tbody><?php 
            if($dt1){$cc=0; foreach ($dt1 as $dta1): $cc++; ?>
            <tr>
                <td> <?php if ($dta1["fecha_vencimiento"] > date('Y-m-d h:i A') ) {  ?> <a title="APROBADO" class="btn btn-primary btn-xs" style="font-size: 80%"><i class="fa fa-check"></i> &nbsp;&nbsp;&nbsp;&nbsp;<b>ACTIVO</b>&nbsp;&nbsp;&nbsp;&nbsp;</a> <?php } else { ?> <a title="NO APROBADO" class="btn btn-danger btn-xs" style="font-size: 80%">
                <i class="fa fa-remove"></i> <b>CONCLUIDO</b>
            </a> <?php } ?> </td>                                              
                <td><?php echo $dta1["or_serie"],'-',$dta1["or_numero"]; ?></td>
                <td><?php echo $dta1["co_serie"],'-',$dta1["num"]; ?></td>
                <td><?php echo $dta1["fecha_ingreso"]; ?></td>
                <td><?php echo $dta1["fecha_inicio"]; ?></td>
                <td><?php echo $dta1["fecha_vencimiento"]; ?></td>
                 <td><?php echo $dta1["cl_nombres"]; ?></td>
                 <td><span class="text"> Para Despacho<span class="pull-right"><?php echo $dta1["digitado"],'/',$dta1["total"]; ?></span> </span>
                       <?php $progress= @(intval($dta1['total']/$dta1['digitado'])*100);    ?>
                    <div class="progress">                                    
                        <div class="progress-bar bg-color-greenLight" style="width:<?php echo $progress.'%';?>"></div>
                    </div></td>
                
                <td style="vertical-align: middle;">
                            <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-sort-down fa-lg"></i> Acciones
                                </button>
                        <ul class="dropdown-menu dropdown-menu-xs pull-right">
                            <li>
                                <a onclick="vAjax('apoyo_postal','mod1',<?php echo $dta1["idorden"] ?>,'modal3')" ><i class="fa fa-plus fa-lg fa-fw txt-color-darken"></i> 
                                    <u>D</u>igitacion</a>
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
    <script type="text/javascript"> table(2,5,3); </script> 
