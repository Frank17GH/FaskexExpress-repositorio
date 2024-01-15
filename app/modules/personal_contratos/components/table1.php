<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Cod</th>
            <th data-class="expand" style="width: 100%"><center>Nombres</center></th>
            <th data-hide="esconder" style="width: 5px">CARGO</th>
            <th data-hide="esconder" style="width: 5pc">GIRO</th>
            <th data-hide="esconder" style="width:5px">INICIO</th>
            <th data-hide="esconder" style="width:5px">FIN</th>
            <th data-hide="esconder" style="width:5px">ESTADO</th>
            <th data-hide="esconder" style="width:5px; text-align: center;">VISUALIZAR</th>
        </tr>
    </thead>

    <tbody>
        <?php 
            if($dt1){
                $venc=0;
                $xvenc=0;
                $reg=0;
                $tot;
                foreach ($dt1 as $data): $color=''; $tot++;
                    if ($data[co_fin]<=date('Y-m-d') && $data[co_fin]!='0000-00-00') {
                        $color='danger';
                        $venc++;
                    }elseif($data[co_fin]<=date('Y-m-d',strtotime('+ 10 day '.date('Y-m-d'))) && $data[co_fin]!='0000-00-00'){
                         $color='warning';
                         $xvenc++;
                    }
                    ?>
                        <tr style="font-size: 12px" class="<?php echo $color ?>">
                            <td style="vertical-align: middle;">
                                <a title="Ver detalles del cliente" class="btn btn-default btn-xs" onclick="vAjax('personal-listar','mod2',<?php echo $data['idpersonas'] ?>1,'modal5');">
                                       <?php echo $data['pe_dni']; ?>
                                </a>
                            </td>
                            <td style="vertical-align: middle;">
                                <?php echo strtoupper($data[pe_apellidos].', '.$data[pe_nombres]); ?>
                                <br>
                                <?php 
                                    if (!$data[ti_descripcion]) {
                                       ?><font style="white-space:nowrap;"><i>(No Especificado)</i></font><?php
                                    }else{
                                        ?><span class="label label-<?php echo $data[ti_color] ?>"><?php echo $data[ti_descripcion] ?></span><?php
                                    }
                                ?>
                            </td>
                            <td style="vertical-align: middle;"><font style="white-space:nowrap;"><?php echo strtoupper($data[ca_descripcion]); ?></font></td>
                            <td style="vertical-align: middle;"><span class="label label-<?php echo $data[gi_color]; ?> "><?php echo $data[lo_abreviatura]; ?></span></td>
                            <td style="vertical-align: middle;"><?php echo date('d/m/Y',strtotime($data[co_inicio])) ?></td>
                            <td style="vertical-align: middle;text-align: center;"><?php echo ($data[co_fin]=='0000-00-00')?'<span class="label label-success ">INDEFINIDO</span>':date('d/m/Y',strtotime($data[co_fin])) ?></td>
                            <td style="vertical-align: middle;"><span class="label label-<?php echo ($data[co_liquidado]==1)? 'success':'danger'; ?> "><?php echo ($data[co_liquidado]==1)? 'Activo':'Liquidado'; ?></span></td>
                            <td style="text-align: center;">
                                <?php 
                                    switch ( $data[co_estado]) {
                                        case '0':
                                        $reg++;
                                            ?>
                                                <a class="btn btn-danger btn-xs" title="Ver Contratos" onclick="vAjax('personal_contratos','mod1',<?php echo $data['idpersonal'] ?>,'modal5');">
                                                    POR REGULARIZAR
                                                </a>
                                            <?php
                                        break;
                                        case '1':
                                            ?>
                                                <a class="btn btn-default btn-xs" title="Ver Contratos" onclick="vAjax('personal_contratos','mod1',<?php echo $data['idpersonal'] ?>,'modal5');">
                                                        VER CONTRATOS
                                                </a>
                                            <?php
                                        break;
                                    }
                                
                            ?><br>
                            <?php 
                                if ($data[co_fin]<=date('Y-m-d') && $data[co_fin]!='0000-00-00') {
                                   ?><i style="color:red"><b>( Vencido )</b></i><?php
                                }elseif($data[co_fin]<=date('Y-m-d',strtotime('+ 10 day '.date('Y-m-d'))) && $data[co_fin]!='0000-00-00'){
                                    ?><i class="txt-color-orange"><b>( Por Vencer )</b></i><?php
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
<script type="text/javascript"> table(1,50,1); $('#i_venc').html('<?php echo $venc ?>');$('#i_xvenc').html('<?php echo $xvenc ?>');$('#i_reg').html('<?php echo $reg ?>');$('#i_tot').html('<?php echo $tot ?>')</script> 
