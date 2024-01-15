
<div class="alert no-margin fade in">
    <button class="close" data-dismiss="alert"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        ×</font></font></button>

<font style="vertical-align: inherit;">
       <?php                            
    if($dt2){ foreach ($dt2 as $dta2): ?>
    <div  style="text-align: center;">
        <a class="label label-danger" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">NUEVOS: </font></font><font id="i_reg"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $dta2['base']?></font></font></font></a>

        <a class="label label-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> PENDIENTES: </font></font><font id="i_venc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $dta2['pendientes']?></font></font></font></a>

        <a class="label label-warning" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ASIGNADOS: </font></font><font id="i_xvenc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $dta2['asignados']?></font></font></font></a>

        <a class="label label-primary" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ENTREGADOS: </font></font><font id="i_tot"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $dta2['entregados']?></font></font></font></a>
    </div>
        <?php endforeach; }else{ ?> <div class="col-md-12"><center><i>(No hay información)</i></center></div> <?php } ?>
</font>
</div>
<table class="table table-striped table-bordered table-hover" id="dtable2" width="100%">
        <thead>
            <tr>
                <th data-class="expand" style="width:5px">Cod</th>
                <th data-hide="esconder" style="width:150px"><center>Fecha / Hora</center></th>
                 <th data-hide="esconder" style="width:150px"><center>Cantidad</center></th>          
                <th data-class="expand" style="width:250px"><center>Responsable</center></th>       
                <th data-hide="esconder" style="width:120px"><center>Observaciones</center></th>
                <th data-hide="esconder" style="width:30px"><center>Tipo</center></th>          
                <th data-hide="esconder" style="width:5px"><center>Estado</center></th>
                <th data-hide="esconder" style="width:40px"><center>Acc.</center></th>
            </tr>
        </thead>
        <tbody><?php 
            if($dt1){ foreach ($dt1 as $dta1):  ?>
            <tr>
                    <td><?php echo "V-".$dta1['de_codigo']; ?></td>                          
                    <td><?php echo $dta1['de_fecha']." - ".$dta1['de_hora']; ?></td>
                    <td><?php echo "Total: ".$dta1['cantidad']; ?></td>
                    <td><?php echo $dta1['responsable']; ?></td>
                    <td><?php echo $dta1['de_observacion']; ?></td>                            
                    <td>
                        <?php if ($dta1['de_tipo']=='0') { ?>
                            <button class="btn btn-success" type="button">local</button>
                        <?php }else { ?>
                            <button class="btn btn-warning" type="button">Nacional</button>
                        <?php } ?>                          
                    </td>
                    <td><?php echo "pendiente" ?></td>
                     <td >
                            <div class="btn-group display-inline ">
                                <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                   <i class="glyphicon glyphicon-list"></i><span class="caret"></span>
                                </button>
                        <ul class="dropdown-menu dropdown-menu-xs pull-right">
                                <li><a href="javascript: void(0)" onclick="vAjax('despacho','vDet',<?php echo $dta1['iddespacho']; ?>,'modal3');"><i class="fa fa-eye"></i>&nbsp;&nbsp;Detalle</a></li>
                                <li><a href="javascript: void(0)" onclick="vAjax('despacho','vPrintMan',<?php echo $dta1['iddespacho'];  ?>)"><i class="fa fa-paper-plane-o"></i>&nbsp;Guia de Despacho </a></li>                         

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
