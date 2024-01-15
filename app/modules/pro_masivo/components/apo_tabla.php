<?php 
    session_start();
    include '../../connection/db.class.php';
    include '.Model.php';
    $class = new Mod();
?>
<table class="table table-striped table-bordered table-hover table-responsive-lg  table table-bordered table-hover table-striped w-100" id="dtable1" width="100%">     
    <thead>
        <tr>
            <th style="width:50px">Opc.</th>
            <th >Ambito</th>
            <th >Empresa</th>
            <th >Destinatario</th>
            <th >Dirección</th>            
            <th >Distrito</th>
            <th >Observacion</th>
            <th  style="width:60px">Telefono</th>
            <th style="width:50px">Peso</th>                        
        </tr>
    </thead>
    <tbody>
    <?php if($dt1){foreach ($dt1 as $data): ?>         
            <tr >
            <td ><fieldset <?php echo ($data[estado]>0)?'disabled':'' ?>>
                <a href="javascript:void(0);" onclick="vAjax('pro_masivo','mod1',<?php echo $data[idapoyo]; ?>,'frm_masivo'); " class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i>
                </a>

                <a href="javascript:void(0);" onclick="confir('Confirmación','Seguro que deseas eliminar elemento seleccionado?','pro_masivo','del_apoyo',<?php echo $data[idapoyo]; ?>,'remove')" class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
                </fieldset>
            </td>
            <td ><?php echo $data[entrega]; ?></td>
            <td><b><?php echo strtoupper($data[ap_empresa]); ?></b></td>
            <td style="vertical-align: middle;"><?php echo $data[persona]; ?></td>
            <td style="vertical-align: middle;"><?php echo $data[direccion]; ?></td>
            <td style="vertical-align: middle;"><?php echo $data[nombre]; ?> <br>
                 
                <?php 
                    echo $data[ap_distrito].'-'.$data[ap_provincia].'-'.$data[ap_departamento];
                ?>


            </td>
            <td style="vertical-align: middle;"><?php echo $data[observaciones]; ?></td>
            <td style="vertical-align: middle;"><?php echo $data[telefono]; ?></td>
            <td style="vertical-align: middle;">Kg <?php echo $data[ap_peso]; ?></td>
            
        </tr>
    <?php endforeach; } ?>
    </tbody>    
</table>

<script type="text/javascript"> table(1,5,1); </script> 
