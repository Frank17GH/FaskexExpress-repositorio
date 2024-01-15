<?php 
    if ($dt1) {
        ?>
            <table class="table table-striped table-bordered table-hover" id="dtable1" width="100%" style="font-size: 11px">
                <thead>
                    <tr>
                        <th style="width: 5px" data-hide="esconder">Cód.</th>
                        <th style="width: 5px" data-hide="esconder">FECHA</th>
                        <th style="width: 80px" data-hide="esconder">HORA</th>
                        <th style="width: 5px" data-hide="esconder">DIA</th>
                        <th>NOMENCLATURA</th>
                        <th data-hide="esconder">USUARIO</th>
                        <th data-hide="esconder">DESCRIPCION</th>
                        <th style="width: 5px" data-hide="esconder">TIPO</th>
                        <th style="width: 5px"></th>
                        <th style="width: 5px">TOTAL</th>
                        <th style="width: 5px">ESTADO</th>
                        </tr>
                </thead>
                <?php 
                    $dias = array("DOMINGO","LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO");
                    $tot=0; $ingre=0;$egre=0;
                    foreach ($dt1 as $dta): 
                        ?>
                            <tr id="tr1_<?php echo $dta[idmovimientos] ?>" class="<?php echo ($dta[mo_tipo]==1)?'success':'danger'; ?>">
                                <td><a href="javascript:void(0);" onclick="vAjax('caja','mod3',<?php echo $dta[idmovimientos] ?>,'modal1');"><?php echo str_pad($dta[idmovimientos], 10, "0", STR_PAD_LEFT);  ?></a></td>
                                <td><font style="display: none;"><?php echo date('Y-m-d',strtotime($dta[mo_fecha])) ?></font><?php echo date('d/m/Y',strtotime($dta[mo_fecha])) ?></td>
                                <td><?php echo date('h:i a',strtotime($dta[mo_fecha])) ?></td>
                                <td><?php echo $dias[date('w',strtotime($dta[mo_fecha]))] ?></td>
                                <td><?php echo ($dta[idnomenclatura]==1)?'TRANSFERENCIA DE CAJA CENTRAL':$dta[no_nombre]; ?></td>
                                <td><?php echo $dta[pe_apellidos].', '.$dta[pe_nombres] ?></td>
                                <td><?php echo $dta[mo_descrip] ?></td>
                                <td>
                                    <span class="label label-<?php echo ($dta[mo_tipo]==1)?'success':'danger'; ?>"><?php echo ($dta[mo_tipo]==1)?'INGRESO':'EGRESO'; ?></span>
                                </td>
                                <td><b>S/.</b></td>
                                <td style="text-align: right;">
                                    <b><?php echo ($dta[mo_tipo]==1)?'':'-'; ?>
                                       <?php 
                                          if($dta[mo_tipo]==1){
                                             $ingre+=$dta[tot];
                                          }else{
                                             $egre+=$dta[tot];
                                          }
                                          echo number_format($dta[tot],2) 
                                       ?>
                                    </b>
                                    </td>
                                <td>
                                    <?php 
                                        if ($dta[mo_tipo]==1) {
                                        }else{
                                            switch ($dta[mo_estado]) {
                                                case '1':
                                                    ?>
                                                        <a class="btn btn-warning btn-xs" href="javascript:void(0);" onclick="vAjax('caja','mod4','<?php echo $dta[idmovimientos].'-/'.$dta[tot] ?>','modal1');">POR RENDIR</a>
                                                    <?php
                                                break;
                                                case '2':
                                                    ?><a class="btn btn-info btn-xs">&nbsp;&nbsp;&nbsp;RENDIDO&nbsp;&nbsp;&nbsp;</a><?php
                                                break;
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php 
                    endforeach; 
                ?>
            </table>
        <script type="text/javascript">table(1,50,1); </script><?php
    }else{
        ?>
            <br><b><center>No hay movimientos registrados</center></b>
        <?php
    }
?>
