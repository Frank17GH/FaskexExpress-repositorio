<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%" style="font-size: 12px">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Tipo</th>
            <th data-hide="esconder" style="width:5px">Giro</th>
            <th data-class="expand" style="width:5px">Serie</th>
            <th data-hide="esconder" style="width:5px">Doc</th>
            <th data-class="expand"><center>Proveedor</center></th>
            <th data-hide="esconder" style="width:5px">Fecha</th>
            <th data-hide="esconder" style="width:5px"></th>
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
                            
                            <td>
                                <span class="label bg-color-white" style="color: #000">
                                    <?php 
                                        if ($data[co_tipo]=='01') {
                                            echo 'Factura';
                                        }elseif ($data[co_tipo]=='03') {
                                            echo 'Boleta';
                                        }elseif ($data[co_tipo]=='07') {
                                            echo 'Nota de crédito';
                                        }elseif ($data[co_tipo]=='08') {
                                            echo 'Nota de débito';
                                        }
                                    ?>
                                </span>
                            </td>
                            <td>
                                <span class="label label-<?php echo $data[gi_color] ?> "><?php echo $data[gi_nombre] ?></span>
                            </td>
                            <td><span class="label bg-color-white" style="color: #000"><?php echo $data['co_serie'].'-'.str_pad($data['co_correlativo'], 8, "0", STR_PAD_LEFT); ?></span></td>
                            <td><?php echo $data['cl_numdoc']; ?></td>
                            <td><?php echo $data['cl_nombres']; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($data['co_fecha']));?></td>
                            <td style="text-align: center;">S/.</td>
                            <td style="text-align: right;"><?php echo number_format($data['co_total'],2); ?></td>
                            <td style="vertical-align: middle;">
                                <a class="btn btn-default btn-xs" onclick="vAjax('compras','mod2',<?php echo $data[idcompras] ?>,'modal1');"><b><i class="fa fa-eye"></i> VER</b></a>
                            </td>
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript"> 
    table(1,50,1); 
</script>