<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Cod</th>
            <th data-class="expand"><center>Nombres</center></th>
            <th data-hide="esconder" style="width:5px">Documento</th>
            <th data-hide="esconder" style="width:5px">Número</th>
            <th data-hide="esconder" style="width:5px">Ver</th>
        </tr>
    </thead>
    <tbody>
        <?php if($dt1){
                    foreach ($dt1 as $data): ?>
                        <tr>
                            <td><?php echo str_pad($data['idpersona'], 4, "0", STR_PAD_LEFT) ?></td>
                            <td><?php echo $data['pe_nombres']; ?></td>
                            <td>DNI</td>
                            <td><?php echo $data[pe_numdoc]; ?></td>
                            <td style="vertical-align: middle;">
                                <a title="Ver detalles del cliente" style="width:45px" class="btn btn-default btn-xs" onclick="vAjax('clientes','viewClient',<?php echo $data[0] ?>,'modal');">
                                       <i class="fa fa-file-text-o"></i>
                                </a>
                            </td>

                           
                        </tr>
                    <?php endforeach; 
                }?>
    </tbody>
</table>
<script type="text/javascript"> table(1,50,1); </script> 
