<div class="col-md-12 jarviswidget jarviswidget-color-blueDark" >
     <header>
        <h2>Lista de Entregados </h2>        
    </header>

    <div class="jarviswidget-editbox"></div>
    <table class="table table-hover">
        <tr>                                
            <th style="width: 1px">#</th>
            <th style="width:80px">Guia Salida</th>
            <th style="width:80px">N° Orden</th>
            <th style="width:17px">Correlativo</th>
            <th >Destinatario</th>       
            <th >C.Origen</th> 
            <th >C.Destino</th> 
            <th >F.Salida</th>
            <th >Tipo</th> 
            <th >Entrega</th> 
            <th style="width:90px">F.Descargo</th>        
            <th style="width:90px">Estado</th>        
            <th style="width:10px">Acc</th>        
        </tr>
        <tbody style="font-size: 11px">
            <?php 
                if ($dt1) {
                    $cc=0;
                    foreach ($dt1 as $dta1): $cc++; $orden = explode('-', $dta1['etiqueta']);$distrito = explode('-', $dta1['distrito'])
                        ?>
                        <tr style="cursor: pointer;">
                            <td><?php echo $cc; ?></td>
                            <td><?php echo $dta1['de_serie'].'-'.$dta1['de_codigo'] ?></td>
                            <td title="<?php echo $orden[0].'-'.$orden[1] ?>"><?php echo $orden[1]?></td>
                            <td><?php echo $orden[2] ?></td>
                            <td><?php echo $dta1['persona'] ?></td>  
                            <td style="white-space:nowrap;"><?php echo mb_strtoupper($dta1[origen]); ?></td>
                            <td style="white-space:nowrap;"><?php echo mb_strtoupper($dta1[distrito]); ?></td>
                            <td><?php echo $dta1['de_fecha'] ?></td>
                            <td><?php echo $dta1['d'] ?></td>                            
                            <td><span class="badge bg-color-greenLight">Domicilio</span></td>
                            <td><?php echo $dta1['dd_fecha'] ?></td>
                            <td>
                                 <?php 
                                    switch ($dta1[dd_estado]) {
                                        case 2:
                                            ?><span class="label label-danger" style="font-size: 100%"><i class="fa fa-warning"></i> PENDIENTE</span><?php
                                            break;
                                        case 3:
                                            ?><span class="label label-warning" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta1['iddet'] ?>,'modal3');" style="font-size: 100%">&nbsp;&nbsp;<i class="fa fa-road"></i> MOTIVADO&nbsp;&nbsp;</span><?php
                                            break;
                                        case 4:
                                            ?><span class="label label-success" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta1['iddet'] ?>,'modal3');" style="font-size: 100%"><i class="fa fa-check"></i> ENTREGADO</span><?php
                                            break;
                                    }
                                ?>
                            </td>   
                            <td>
                                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-sort-down "></i> Acciones
                                </button>
                                    <ul class="dropdown-menu dropdown-menu-xs pull-right">

                                    <?php 
                                        if ($dta1[dd_estado]==2 ) {
                                            ?>
                                                <li>
                                                    <a href="javascript:void(0);" onclick="vAjax('exp_descargop','mod_Descargo',<?php echo "'".$dta1['idapoyo'].'-/1'."'" ?>,'modal4')"><i class="fa fa-check fa-lg fa-fw txt-color-green"></i> 
                                                    <u>G</u>enerar Descargo</a>
                                                </li>
                                            <?php
                                        }else{
                                            if ($dta1[dd_estado]>2 ) {
                                                ?>
                                                    <li>
                                                        <a href="javascript:void(0);" onclick="vAjax('exp_descargop','mod_Descargo',<?php echo "'".$dta1['idapoyo'].'-/1'."'" ?>,'modal4')"><i class="fa fa-check fa-lg fa-fw txt-color-green"></i> 
                                                        <u>V</u>erificar Descargo</a>
                                                    </li>                                                  

                                                <?php
                                            }
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

                <?php 
                if ($dt2) {
                    $cc=0;
                    foreach ($dt2 as $dta2): $cc++; $orden = explode('-', $dta2['etiqueta']);$distrito = explode('-', $dta2['distrito'])
                        ?>
                        <tr style="cursor: pointer;">
                            <td><?php echo $cc; ?></td>
                            <td><b><?php echo $dta2['de_codigo'] ?></b></td>
                            <td colspan="2" ><b><?php echo $dta2[co_serie].'-'.str_pad($dta2[co_correlativo], 8, "0", STR_PAD_LEFT) ?></td>
                            <td><?php echo $dta2[de_nombre] ?></b></td>

                            <td style="white-space:nowrap;"><?php echo mb_strtoupper($dta2[nombre]); ?></td>

                            <td style="white-space:nowrap;"><?php echo mb_strtoupper($dta2[distrito]); ?></td>                                            
                            <td style="text-align: center;">
                                <?php 
                                    $fecha1 = new DateTime(date('Y-m-d', strtotime($dta2['de_fecha'])) );
                                    $fecha2 = new DateTime(date('Y-m-d', strtotime($dta2['de_fechacierre'])));

                                    $resultado = $fecha1->diff($fecha2);
                                    $dias=$resultado->format('(%a)');

                                    echo date('d/m/Y', strtotime($dta2['de_fecha']));
                                    if ($dias<3) {
                                       ?><br><font style="color:green"><b><?php echo $dias; ?></b></font><?php
                                    }elseif($dias>10 && $dias<15){
                                        ?><br><font style="color:red"><b><?php echo $dias; ?></b></font><?php
                                    }else{
                                        ?><br><font><b><?php echo $dias; ?></b></font><?php
                                    }
                                ?>
                            </td>
                            <td style="white-space:nowrap;text-align: center;">
                                <?php 
                                    if ($dta2[de_tipo_encomienda]==1) {
                                        ?><i class="fa fa-file txt-color-orange fa-lg"></i> <b>(SOBRE)</b><?php
                                    }else{

                                        ?><i><img style="width: 21px;" src="app/recursos/img/paquete.png"></i> <b>(PAQUETE)</b><?php
                                    }
                                ?>

                                <br><font style="color:green"><b>(<?php echo $dta2[de_peso].' '.$dta2[de_medida]; ?>)</b></font>
                            </td>                            
                            <td><?php if($dta2[de_tipo_entrega]==1){echo '<span class="badge bg-color-greenLight">Domicilio</span>';}elseif($dta2[de_tipo_entrega]==2){echo '<span class="badge bg-color-darken">Agencia</span>';}; ?></td>                                                        
                            <td><?php echo $dta2['dd_fecha'] ?></td>
                            <td>
                                 <?php 
                                    switch ($dta2[dd_estado]) {
                                        case 2:
                                            ?><span class="label label-danger" style="font-size: 100%"><i class="fa fa-warning"></i> PENDIENTE</span><?php
                                            break;
                                        case 3:
                                            ?><span class="label label-warning" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta2['iddet'] ?>,'modal3');" style="font-size: 100%">&nbsp;&nbsp;<i class="fa fa-road"></i> MOTIVADO&nbsp;&nbsp;</span><?php
                                            break;
                                        case 4:
                                            ?><span class="label label-success" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta2['iddet'] ?>,'modal3');" style="font-size: 100%"><i class="fa fa-check"></i> ENTREGADO</span><?php
                                            break;
                                    }
                                ?>
                               
                            </td>  

                            <td>
                                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-sort-down "></i> Acciones
                                </button>
                                    <ul class="dropdown-menu dropdown-menu-xs pull-right">

                                    <?php 
                                    echo $dta2[dd_estado];
                                        if ($dta2[dd_estado]==2 ) {
                                            ?>
                                                <li>
                                                    <a href="javascript:void(0);" onclick="vAjax('exp_descargop','mod_Descargo',<?php echo "'".$dta2['idapoyo'].'-/2'."'" ?>,'modal4')"><i class="fa fa-check fa-lg fa-fw txt-color-green"></i> 
                                                    <u>G</u>enerar Descargo</a>
                                                </li>
                                            <?php
                                        }else{
                                            if ($dta2[dd_estado]>2 ) {
                                                ?>
                                                    <li>
                                                        <a href="javascript:void(0);" onclick="vAjax('exp_descargop','mod_Descargo',<?php echo "'".$dta2['idapoyo'].'-/2'."'" ?>,'modal4')"><i class="fa fa-check fa-lg fa-fw txt-color-green"></i> 
                                                        <u>V</u>erificar Descargo</a>
                                                    </li>
                                                    

                                                <?php
                                            }
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
</div>

<!-- 
<li>
                                                    <a href="javascript:void(0);" onclick="vAjax('','print',,'modal')"><i class="fa fa-print fa-lg fa-fw txt-color-blue"></i> 
                                                        <u>I</u>mprimir Descargo</a>
                                                </li>                                   

                                                <li >
                                                    <a href="javascript:void(0);" onclick="confir('Eliminacion','¿Seguro que deseas borrar datos de entrega, del elemeneto seleccionado?','manifiesto','del1',,'remove');"><i class="fa fa-remove fa-lg fa-fw txt-color-red"></i> 
                                                    <u>B</u>orrar Datos</a>
                                                </li>

    -->