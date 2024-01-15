<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">DNI</th>
            <th data-class="expand"><center>Nombres</center></th>
            <td style="width: 100px">Cumpleños</td>
            <th data-class="expand" style="width: 5px">Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $mes = array(0,'Enero','Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre','Diciembre');
            if($dt1){
                foreach ($dt1 as $data): 
                    ?>
                        <tr style="font-size: 12px">
                            <td>
                                <a title="Ver detalles del cliente" class="btn btn-default btn-xs" onclick="vAjax('personal-listar','mod2',<?php echo $data['idpersonal'] ?>,'modal5');">
                                    <?php echo $data['pe_dni'] ?>
                                </a>
                            </td>
                            <td><?php echo strtoupper($data['pe_apellidos'].', '.$data['pe_nombres']); ?></td>
                            <td style="text-align: center;">
                                <?php 
                                    if ($data['pe_nacimiento']=='0000-00-00' || !$data['pe_nacimiento']) {
                                        ?><i>(No Especificado)</i><?php
                                    }else{
                                        echo date('d',strtotime($data[pe_nacimiento])).' de '.$mes[date('n',strtotime($data[pe_nacimiento]))].'.';
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if ($data['cont']) {
                                        ?>
                                            <span class="label label-success">ACTIVO</span>
                                        <?php
                                    }else{
                                        ?>
                                            <span class="label label-danger">INACTIVO</span>
                                        <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript"> table(1,50,1); </script> 
