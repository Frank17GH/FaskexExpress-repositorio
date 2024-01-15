<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%" style="font-size: 11px">
    <thead>

        <tr>
            <th style="width: 5px" data-hide="esconder">Cód.</th>
            <th style="width: 5px" data-hide="esconder">FECHA</th>
            <th style="width: 50px" data-hide="esconder">HORA</th>
            <th style="width: 5px" data-hide="esconder">DIA</th>
            <th>NOMENCLATURA</th>
            <th data-hide="esconder">USUARIO</th>
            <th data-hide="esconder">DESCRIPCION</th>
            <th style="width: 5px"></th>
            <th style="width: 100px">TOTAL</th>
        </tr>
    </thead>
    <?php 
        $egre=0;
        $dias = array("DOMINGO","LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO");
        if ($dt1) {$cred=0;$inter=0;$efect=0;
            foreach ($dt1 as $dta): 
                switch ($dta[mo_tip_op]) {
                    case 1:
                        $efect+=$dta[mo_total];
                        break;
                    case 2:
                        $cred+=$dta[mo_total];
                        break;
                    case 3:
                        $inter+=$dta[mo_total];
                        break;
                    
                    default:
                        # code...
                        break;
                }
                ?>
                    <tr id="tr1_<?php echo $dta[idmovimientos] ?>" class="<?php echo ($dta[mo_tipo]==1)?'success':'danger'; ?>">
                        <td><a href="javascript:void(0);" onclick="vAjax('caja','mod3',<?php echo $dta[idmovimientos] ?>,'modal1');"><?php echo str_pad($dta[idmovimientos], 10, "0", STR_PAD_LEFT);  ?></a></td>
                        <td><?php echo date('d/m/Y',strtotime($dta[mo_fecha])) ?></td>
                        <td><?php echo date('h:i a',strtotime($dta[mo_fecha])) ?></td>
                        <td><?php echo $dias[date('w',strtotime($dta[mo_fecha]))] ?></td>
                        <td><?php echo ($dta[mo_tipo]==1)?'INGRESO':$dta[no_nombre]; ?></td>
                        <td><?php echo $dta[pe_apellidos].', '.$dta[pe_nombres] ?></td>
                        <td><?php echo ($dta[mo_descrip])?$dta[mo_descrip]:'<i>(Sin Descripción)</i>' ?></td>
                        <td><b>S/.</b></td>
                        <td style="text-align: right;"><b>
                            <?php 
                                if ($dta[mo_tipo]==1) {
                                    
                                }else{$egre+=$dta[mo_total];
                                    echo '-';
                                }
                            ?>

                            <?php echo number_format($dta[mo_total],2) ?></b></td>

                    </tr>
                <?php
            endforeach; 
        }else{
            ?>
                <tr>
                    <td colspan="11"><i><center>No hay Ingresos Registrados</center></i></td>
                </tr>
            <?php
        }
    ?>
</table>
<script type="text/javascript"> table(1,50,0); </script> 
<div class="col-md-12">
    <br>
</div>
<div class="col-md-3">
    <div class="form-group has-error">
        <div class="col-md-12">
            <span class="help-block" style="text-align: center;"> <b>Trans. BCP</b></span>
            <div class="input-group">
                <span class="input-group-addon"><b>S/.</b></span>
                <input class="form-control" type="text" style="text-align: right;" value="<?php echo number_format($cred,2) ?>">
                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group has-error">
        <div class="col-md-12">
            <span class="help-block" style="text-align: center;"> <b>Trans. Interbank</b></span>
            <div class="input-group">
                <span class="input-group-addon"><b>S/.</b></span>
                <input class="form-control" type="text" style="text-align: right;" value="<?php echo number_format($inter,2) ?>">
                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group has-error">
        <div class="col-md-12">
            <span class="help-block" style="text-align: center;"> <b>Efectivo</b></span>
            <div class="input-group">
                <span class="input-group-addon"><b>S/.</b></span>
                <input class="form-control" type="text" style="text-align: right;" value="<?php echo number_format($efect,2) ?>">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="form-group has-error">
        <div class="col-md-12">
            <span class="help-block" style="text-align: center;"> <b>Total Egresos</b></span>
            <div class="input-group">
                <span class="input-group-addon"><b>S/.</b></span>
                <input class="form-control" type="text" style="text-align: right;" value="<?php echo number_format($egre,2) ?>">
                <span class="input-group-addon"><i class="fa fa-minus"></i></span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <br>
</div>