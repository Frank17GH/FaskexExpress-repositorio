<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Cod</th>
            <th data-class="expand"><center>Nombres</center></th>
            <th >Cargo</th>
            <th data-hide="esconder" style="width:5px">Agencia</th>
            <th data-hide="esconder" style="width:5px">Estado</th>
            <th data-hide="esconder" style="width:5px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                foreach ($dt1 as $data): 
                    ?>
                        <tr class="<?php echo ($data[estado]==2)?'danger':'' ?>">
                            <td><?php echo $data[pe_dni] ?></td>
                            <td><?php echo mb_strtoupper($data[pe_apellidos].', '.$data[pe_nombres]); ?></td>
                            <td><?php echo $data[ca_descripcion]; ?></td>
                            <td>
                                <?php 
                                if ($s02['tipo']) {
                                    $class = new Mod();
                                    $dt1 = $class->sel2($data[idpersonal]); 
                                    foreach ($dt1 as $dta):
                                       ?>
                                            <a class="label label-info" onclick="vAjax('configuracion-general','mod2',<?php echo $dta[idlocales] ?>,'modal1')"><?php echo mb_strtoupper('['.$dta[dist].'] '.$dta[lo_abreviatura]); ?></a>
                                       <?php
                                    endforeach; 
                                }else{
                                    ?><span class="label label-info"><i><?php echo 'Todas las Sedes'; ?></i></span><?php
                                }
                                 ?>
                            </td>
                            <td>
                                <?php 
                                    if ($data[estado]==1) {
                                        ?>
                                            <span class="label label-success">Activo</span>
                                        <?php
                                     }else if($data[estado]==2){
                                        ?>
                                            <span class="label label-danger">Eliminado</span>
                                        <?php
                                     }else{
                                        ?>
                                            <span class="label label-warning">Inactivo</span>
                                        <?php
                                     }
                                ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                    <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-cog fa-lg"></i> Configurar
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-xs pull-right">
                                        <li>
                                            <a href="javascript:void(0);" onclick="vAjax('configuracion-usuarios','mod1',<?php echo $data[idpersonal] ?>,'modal1');"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> 
                                                <u>V</u>er detalles</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="vAjax('configuracion-usuarios','mod4',<?php echo $data[idpersonal] ?>,'modal1')"><i class="fa fa-institution fa-lg fa-fw txt-color-red"></i> 
                                                <u>A</u>signar Giros</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="vAjax('configuracion-usuarios','mod5',<?php echo $data[idpersonal] ?>,'modal1')"><i class="fa fa-tag fa-lg fa-fw txt-color-blue"></i> 
                                                <u>A</u>signar Locales</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="vAjax('configuracion-usuarios','mod2',<?php echo $data[idpersonal] ?>,'modal1')"><i class="fa fa-eye fa-lg fa-fw txt-color-green"></i> 
                                                <u>M</u>odificar Vistas</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="confir('Eliminacion','¿Seguro que deseas eliminar el usuario seleccionado?','configuracion-usuarios','del3',<?php echo $data[idpersonal] ?>,'remove');"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> 
                                                <u>E</u>liminar Usuario</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li class="text-align-center">
                                            <a href="javascript:void(0);">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>                           
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript"> table(1,50,1); </script> 
