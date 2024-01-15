<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-class="expand"><center>Departamento</center></th>
            <th data-hide="esconder"><center>Provincia</center></th>
            <th data-hide="esconder"><center>Distrito</center></th>
            <th data-hide="esconder" style="width: 5px"><center>Precio Sobre</center></th>
            <th data-hide="esconder" style="width: 5px"><center>Kilo base</center></th>
            <th data-hide="esconder" style="width: 5px"><center>Kilo Adic.</center></th>
            <th data-hide="esconder" style="width: 5px"><center>Envio Domicilio</center></th>
            <th data-hide="esconder" style="width:5px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                foreach ($dt1 as $data): 
                    ?>
                        <tr class="<?php echo (!$data[kilo_base] || !$data[kilo_adicional])?'danger':'' ?>" id="tr<?php echo $data[iddist] ?>">
                            <td><?php echo '['.$data[iddpto].'] '.strtoupper($data[dpto]); ?></td>
                            <td><?php echo '['.$data[idprov].'] '.strtoupper($data[prov]); ?></td>
                            <td><?php echo '['.$data[iddist].'] '.strtoupper(utf8_encode($data[dist])); ?></td>
                            <td>
                                <input id="pc<?php echo $data[iddist] ?>" class="form-control input-xs" value="<?php echo number_format($data[precio_sobre],2) ?>" placeholder="0.00" style="width: 70px;text-align: right;">
                            </td>
                            <td style="text-align: center;">
                                <div class="icon-addon addon-md">
                                    <input id="pb<?php echo $data[iddist] ?>" class="form-control input-xs" value="<?php echo number_format($data[kilo_base],2) ?>" placeholder="0.00" style="width: 70px;text-align: right;">
                                    <label style="padding: 4px 0;" class="glyphicon  input-xs"><b>S/.</b></label>
                                </div>
                            </td>
                            <td style="text-align: center;">
                                <div class="icon-addon addon-md">

                                    <input id="pa<?php echo $data[iddist] ?>" class="form-control input-xs" value="<?php echo number_format($data[kilo_adicional],2) ?>" placeholder="0.00" style="width: 90px;text-align: right;" >
                                    <label style="padding: 4px 0;" class="glyphicon  input-xs"><b>S/.</b></label>
                                </div>
                            </td>
                             <td style="text-align: center;">
                                <div class="icon-addon addon-md">

                                    <input id="ed<?php echo $data[iddist] ?>" class="form-control input-xs" value="<?php echo number_format($data[envio_dom],2) ?>" placeholder="0.00" style="width: 90px;text-align: right;" >
                                    <label style="padding: 4px 0;" class="glyphicon  input-xs"><b>S/.</b></label>
                                </div>
                            </td>
                            <td style="vertical-align: middle;">
                                <a title="Guardar precios" class="btn btn-default btn-xs" onclick="vAjax('configuracion-calculadora_de_precios','mod1',$('#pb<?php echo $data['iddist'] ?>').val()+'-/'+$('#pa<?php echo $data['iddist'] ?>').val()+'-/'+$('#ed<?php echo $data['iddist'] ?>').val()+'-/<?php echo $data['iddist'] ?>-/'+$('#pc<?php echo $data['iddist'] ?>').val());">
                                       <i class="fa fa-save"></i> Guardar
                                </a>
                            </td>

                           
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript"> table(1,50,1); </script> 