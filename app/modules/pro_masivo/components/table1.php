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
            <th >Empresa</th>
            <th >Destino</th>
            <th >Dirección</th>
            <th >Distrito</th>
            <th >Postal</th>
            <th  style="width:60px">Fecha Dig.</th>
            <th style="width:5px">Peso</th>            
            <th style="width:5px">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php if($dt1){ foreach ($dt1 as $data): ?>
        <tr>
            <td>
                <a href="javascript:void(0);" onclick="mostrar('cuentas');vAjax('cuentas','mod1',<?php echo $data[idcuenta]; ?>,'frm_cuenta'); " class="btn btn-primary btn-sm btn-icon rounded-circle">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-icon rounded-circle">
                    <i class="fal fa-trash-alt"></i>
                </a>
            </td>
            <td>
                <div class="well well-sm bg-color-white txt-color-black text-center">
                    <font><b><?php echo strtoupper($data[cu_tipo]); ?></b></font>
                </div>
            </td>
            <td style="vertical-align: middle;"><?php echo $data[cu_nombre]; ?></td>
            <td style="vertical-align: middle;"><?php echo $data[cu_nombre]; ?></td>
            <td style="vertical-align: middle;"><?php echo $data[cu_fecha]; ?></td>
            <td style="vertical-align: middle;"><?php echo $data[cl_nombres]; ?></td>
            <td><i class="fal <?php echo ($data[cu_total]>0)?'fa-plus':'fa-minus' ?> text-<?php echo ($data[cu_total]>0)?'success':'danger' ?> fw-500"></i><b> S/ <?php echo number_format(abs($data[cu_total]), 2, '.', ''); ?></b>
            </td>                        
            <td ><span class="badge badge-<?php echo ($data[cu_balance]>0)?'primary':'danger'?> badge-pill "><?php echo ($data[cu_balance]>0)?'Si':'No' ?></span>
            </td>
            <td>
                <div class="input-group-append">
                    <button type="button" class="btn btn-xs btn-primary shadow-0 dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Acciones
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" onclick="vAjax('cuentas','mod_registros',<?php echo $data[idcuenta]; ?>,'modal1');"><i class='subheader-icon fal fa-align-justify'></i> Registros</a>
                        <a class="dropdown-item"><i class='subheader-icon fal fa-plus sm'></i> Transaccion</a>
                        <a class="dropdown-item"><i class='subheader-icon fal fa-exchange'></i> Traspaso</a>
                        <div role="separator" class="dropdown-divider"></div> 
                        <a class="dropdown-item " onclick="confir('Eliminacion','¿Seguro que deseas eliminar el vehiculo seleccionado?','vehiculos','del1',<?php echo $data[idvehiculos] ?>,'remove')"><i class='subheader-icon fal fa-lock-alt'></i> Cerrar Cuenta</a>
                    </div>
                </div>
            </td>                          
        </tr>
    <?php endforeach; }?>
    </tbody>    
</table>
<script type="text/javascript"> table(1,5,1); </script> 
