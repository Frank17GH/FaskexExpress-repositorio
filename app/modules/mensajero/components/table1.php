<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:1px">Cód</th>
            <th data-hide="esconder" style="width:5px">Fecha</th>
            <th data-class="expand" >Mensajero</th>
            <th data-hide="esconder" >Entregado</th>
            <th data-class="expand">Pendiente</th>
            <th data-hide="esconder" style="width:5px">Acc.</th>
        </tr>
    </thead>
    <tbody style="font-size: 11px">
        <?php 
            if($dt1){
                foreach ($dt1 as $dta1): $color='';
                     if ($dta1[pendiente]==0) {
                        $color='success';                       
                    }else {
                       $color='danger';
                    }
                    ?>
                        <tr style="font-size: 12px" class="<?php echo $color ?>">
                            <td><?php echo str_pad($dta1[idhojaruta], 10, "0", STR_PAD_LEFT) ?></td>
                            <td><?php echo date('d/m/Y',strtotime($dta1[ru_fecha])) ?></td>
                            <td><?php echo $dta1[pe_apellidos].', '.$dta1[pe_nombres] ?></td>
                            <td><?php echo $dta1[entregado] ?></td>
                            <td><?php echo $dta1[pendiente] ?></td>
                            <td style="vertical-align: middle;">
                                 <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                    <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-sort-down fa-lg"></i> Acciones
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-xs pull-right">
                                                                            
                                        <li>
                                            <a href="javascript:void(0);" onclick="vAjax('mensajero','print',<?php echo  $dta1[idhojaruta] ?>,'modal')"><i class="fa fa-print fa-lg fa-fw txt-color-blue"></i> 
                                                <u>I</u>mprimir Hoja de Ruta</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="vAjax('mensajero','mod2',<?php echo $dta1[idhojaruta] ?>,'modal3');"><b><i class="fa fa-eye fa-lg fa-fw txt-color-blueDark"></i> DETALLES</b></a>
                                        </li>
                                       
                                        <li >
                                            <a ><i class="fa fa-remove fa-lg fa-fw txt-color-red"></i> 
                                            <u>E</u>liminar</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li class="text-align-center">
                                            <a href="javascript:void(0);">Cancelar</a>
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