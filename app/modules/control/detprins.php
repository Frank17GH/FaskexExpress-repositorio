<table class="table table-striped table-bordered table-hover" id="dtable" width="100%">
    <thead>
        <tr>
            <th style="width:5px"><center>Bultos</center></th>
            <th style="width:100px"><center>Descripcion</center></th>
            <th style="width:50px"><center>Destinatario</center></th>
            <th style="width:5px"><center>Peso</center></th>
            <th style="width:5px"><center>Flete</center></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                $total=0;
                $placas='';
                foreach ($dt1 as $dta1):$total+=$dta1['flete'];$nr_guia.=$dta1[nr_guia].", "?>
                    <tr>
                        <td style="vertical-align: middle;text-align: right;"><?php echo $dta1['bultos']; ?></td>
                        <td style="vertical-align: middle;cursor: pointer;" onclick="vAjax('guia_varias','vMCaja',<?php echo $dta1[idDET] ?>,'modal');"><?php echo $dta1['descrip'] ?></td>
                        <td style="vertical-align: middle;text-align: right;"><?php echo $dta1['destinatario']; ?></td>
                        <td style="vertical-align: middle;text-align: right;"><b><?php  echo number_format($dta1['peso'],2) ?> KG.</b></td>
                        <td style="vertical-align: middle;text-align: right;cursor: pointer;" onclick="vAjax('guia_varias','vMCaja',<?php echo $dta1[idDET] ?>,'modal');"><b>S/ <?php  echo number_format($dta1['flete'],2) ?></b></td>
                    </tr>
                    <?php endforeach; 
                }?>
                <tr>
                    <th colspan="4"><center>TOTAL: </center></th>
                    <td style="vertical-align: middle;text-align: right;"><b>S/ <?php echo number_format($total,2) ?></b></td>
                </tr>
    </tbody>
</table>
<?php if ($total>0): ?>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary btn-group btn-group-justified">Facturar</button>
    </div>
<?php endif ?>

    <script type="text/javascript">
        $("#placas_vales").val('<?php echo substr($nr_guia, 0,-2) ?>');
    </script>