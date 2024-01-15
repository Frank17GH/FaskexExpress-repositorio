<table class="table table-striped table-bordered table-hover" id="dtable13" width="100%">
    <thead>
        <tr>
            <th style="width:10px"><center>Guia</center></th>
            <th style="width:5px"><center>Fecha</center></th>
            <th style="width:100px"><center>Destinatario</center></th>
            <th style="width:100px"><center>Detalle</center></th>
            <th style="width:50px"><center>Total</center></th>
            <th style="width:5px"><center>[Sel]</center></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                foreach ($dt1 as $dta1): ?>
                    <tr>
                        <td style="vertical-align: middle;"><a title="Ver Guia" onclick="vAjax('guia','mRut',<?php echo $dta1[0] ?>,'prod');" class="btn btn-default btn-xs"><?php echo $dta1[nr_guia] ?></a></td>
                        <td style="vertical-align: middle;"><?php echo $dta1[fech] ?></td>
                        <td style="vertical-align: middle;"><?php echo $dta1[destinatario] ?></td>
                        <td style="vertical-align: middle;"><?php echo $dta1[detalle] ?></td>
                        <td style="vertical-align: middle;text-align: right;"><b>S/ <?php echo number_format($dta1[total],2) ?></b></td>
                        <td style="vertical-align: middle;">
                            <?php if ($dta1[Sel]=='0'): ?>
                                <a class="btn btn-default" onclick="vAjax('guia_varias','Seleccionguia',<?php echo $dta1[0]?>);" style="padding: 1px 12px;"><i class="fa fa-toggle-off"></i> </a>
                            <?php else: ?> 
                                <a class="btn btn-default" onclick="vAjax('guia_varias','Seleccionguia',<?php echo $dta1[0]?>);" style="padding: 1px 12px;"><i class="fa fa-toggle-on"></i> </a> 
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php endforeach; 
                }?>
    </tbody>
</table>
<script type="text/javascript">table(13)</script> 