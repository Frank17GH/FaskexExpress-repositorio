<table class="table table-striped table-bordered table-hover" id="dtable20" width="100%">
    <thead>
        <tr>
            <th data-hide="phone">Serie</th>
            <th data-class="expand"><center>Destinatario</center></th>
            <th style="width:5px"><center>Fact.</center></th>
            <th style="width:5px"><center>Fact.</center></th>
        </tr>
    </thead>
    <tbody>
        <?php if($dt1){
                    foreach ($dt1 as $data): ?>
                        <tr>
                            <td><?php echo $data['serie'].'-'.str_pad($data['correlativo'], 4, "0", STR_PAD_LEFT) ?></td>
                            <td><?php echo $data['destinoNombre']; ?></td>
                            <td style="vertical-align: middle;">
                                <a title="Ver detalles del cliente" class="btn btn-default btn-xs" onclick="vAjax('guias_remision','mostrarGuia', '<?php echo $data['id'] .'-/'.$data['origenDoc'] ?>');">
                                    <i class="fa fa-check"></i> Rem
                                </a>
                            </td>
                            <td style="vertical-align: middle;">
                                <a title="Ver detalles del cliente" class="btn btn-default btn-xs" onclick="vAjax('guias_remision','mostrarGuia', '<?php echo $data['id'] .'-/'.$data['destinoDoc'] ?>');">
                                    <i class="fa fa-check"></i> Dest
                                </a>
                            </td>

                           
                        </tr>
                    <?php endforeach; 
                }?>
    </tbody>
</table>
<script type="text/javascript">table2(20)</script> 