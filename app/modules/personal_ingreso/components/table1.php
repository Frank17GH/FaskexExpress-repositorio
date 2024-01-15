<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Cod</th>
            <th data-class="expand"><center>Nombres</center></th>
            <th data-hide="esconder" style="width: 5pc">Giro - Local</th>
            <th data-hide="esconder" style="width: 5pc">Ubicacion</th>
            <th data-hide="esconder" style="width: 5px">Cargo</th>
            <th data-hide="esconder" style="width:5px">Ingreso</th>
            <th data-hide="esconder" style="width:5px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                foreach ($dt1 as $data): 
                    ?>
                        <tr>
                            <td style="vertical-align: middle;">
                                <a title="Ver detalles del cliente" class="btn btn-default btn-xs" onclick="vAjax('personal-listar','mod2',<?php echo $data['idpersonal'] ?>,'modal5');">
                                       <?php echo $data['pe_dni']; ?>
                                </a>
                            </td>
                            <td style="vertical-align: middle;"><?php echo strtoupper($data[pe_apellidos].', '.$data[pe_nombres]); ?> <br> <span class="label label-<?php echo $data[ti_color] ?>"><?php echo $data[ti_descripcion] ?></span></td>
                            <td style="vertical-align: middle;"><span class="label label-<?php echo $data[gi_color]; ?> "><?php echo $data[lo_abreviatura]; ?></span></td>
                            <td style="vertical-align: middle;"><font style="white-space:nowrap;"><?php echo strtoupper($data[distrito]); ?></font></td>
                            <td style="vertical-align: middle;"><font style="white-space:nowrap;"><?php echo strtoupper($data[ca_descripcion]); ?></font></td>
                            <td style="vertical-align: middle;"><?php echo date('d/m/Y',strtotime($data[co_inicio])) ?></td>
                            <td style="vertical-align: middle;"><a title="Ver detalles del cliente" class="btn btn-default btn-xs" onclick="vAjax('personal_ingreso','mod1',<?php echo $data['idcontratos'] ?>,'modal1');">
                                       Detalle de Ingreso                                </a></td>
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript"> table(1,50,1); </script> 
