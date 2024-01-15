<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-class="expand" style="width: 5px"><center>REMITO</center></th>
            <th data-class="expand" style="width: 5px"><center>DNI</center></th>
            <th data-class="expand"><center>CONSIGNADO</center></th>
            <th data-hide="esconder" style="width:5px">ENVIO</th>
            <th data-hide="esconder" style="width:5px">TIPO</th>
            <th data-hide="esconder" style="width:5px">ORIGEN</th>
            <th data-hide="esconder" style="width:5px">DESTINO</th>
            <th data-hide="esconder" style="width:5px">ENTREGA</th>
            <th data-hide="esconder" style="width:5px">ESTADO</th>
        </tr>
    </thead>
    <tbody style="font-size: 12px">
        <?php 
            if($dt1){
                foreach ($dt1 as $data): 
                    ?>
                        <tr>
                            <td><?php echo str_pad($data[iddet], 8, "0", STR_PAD_LEFT); ?></td>
                            <td><?php echo $data[de_ruc]; ?></td>
                            <td><?php echo mb_strtoupper($data[de_nombre]); ?></td>
                            <td style="text-align: center;">
                                <?php 
                                    $fecha1 = new DateTime(date('Y-m-d', strtotime($data[co_fecha])) );
                                    $fecha2 = new DateTime(date('Y-m-d'));
                                    $resultado = $fecha1->diff($fecha2);
                                    $dias=$resultado->format('(%a)');
                                    echo date('d/m/Y', strtotime($data[co_fecha]));
                                    if ($dias<10) {
                                       ?><br><font style="color:green"><b><?php echo $dias; ?></b></font><?php
                                    }elseif($dias>10 && $dias<15){
                                        ?><br><font><b><?php echo $dias; ?></b></font><?php
                                    }else{
                                        ?><br><font><b><?php echo $dias; ?></b></font><?php
                                    }
                                ?>
                            </td>
                            <td style="white-space:nowrap;">
                                <?php 
                                    if ($data[de_tipo_encomienda]==1) {
                                        ?><i class="fa fa-file txt-color-orange fa-lg"></i> <b>(SOBRE)</b><?php
                                    }else{

                                        ?><i><img style="width: 21px;" src="app/recursos/img/paquete.png"></i> <b>(PAQUETE)</b><?php
                                    }
                                ?>
                            </td>
                            <td style="white-space:nowrap;"><?php echo mb_strtoupper(utf8_encode($data[nombre])); ?></td>
                            <td style="white-space:nowrap;">
                                <?php 

                                    $class = new Mod();
                                    $local = $class->local($data[dest]);
                                    echo mb_strtoupper(utf8_encode($local[0]['nombre'])); 
                                ?>
                            </td>
                            <td><?php if($data[de_tipo_entrega]==1){echo '<span class="badge bg-color-greenLight">Domicilio</span>';}elseif($data[de_tipo_entrega]==2){echo '<span class="badge bg-color-darken">Agencia</span>';}; ?></td>
                            <td>
                                <?php 
                                    if ($data[est_paq]==1) {
                                        ?>
                                            <a class="label label-danger" style="font-size: 100%;" onclick="vAjax('traking','mod1',<?php echo $data[iddet] ?>,'modal1')"><i class="fa fa-lg fa-fw fa-cubes"></i> POR CARGAR</a>
                                        <?php
                                    }elseif ($data[est_paq]==2) {
                                        ?>
                                            <a class="label label-warning" style="font-size: 100%;" onclick="vAjax('traking','mod1',<?php echo $data[iddet] ?>,'modal1')">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-lg fa-fw fa-truck"></i> EN RUTA&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                        <?php
                                    }elseif ($data[est_paq]==3) {
                                        ?>
                                            <a class="label label-success" style="font-size: 100%;" onclick="vAjax('traking','mod1',<?php echo $data[iddet] ?>,'modal1')"><i class="fa fa-lg fa-fw fa-database"></i> EN AGENCIA</a>
                                        <?php
                                    }elseif ($data[est_paq]==5) {
                                        ?>
                                            <a class="label bg-color-greenLight pull-right" style="font-size: 100%;" onclick="vAjax('traking','mod1',<?php echo $data[iddet] ?>,'modal1')"><i class="fa fa-envelope"></i> MENSAJERO</a>
                                        <?php
                                    }elseif ($data[est_paq]==4) {
                                        ?>
                                            <a class="label label-primary" style="font-size: 100%;" onclick="vAjax('traking','mod2',<?php echo $data[iddet] ?>,'modal1')"><i class="fa fa-lg fa-fw fa-check"></i> ENTREGADO</a>
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
