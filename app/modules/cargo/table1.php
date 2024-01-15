
<div class="alert no-margin fade in">
    <button class="close" data-dismiss="alert"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        ×</font></font></button>

<font style="vertical-align: inherit;">
       <?php                            
    if($dt2){ foreach ($dt2 as $dta2): ?> 
    <div  style="text-align: center;">
        <a class="label label-default"  onclick="filt('Nuevo')"  ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">NUEVOS: </font></font><font id="i_reg"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $dta2['nuevos']?></font></font></font></a>

        <a class="label label-danger" onclick="filt('Apoyo')"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> APOYO POSTAL: </font></font><font id="i_venc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $dta2['base'] + $dta2['impreso'] +$dta2['habilitado'] + $dta2['pendientes'] ?></font></font></font></a>

        <a class="label label-primary"  onclick="vAjax('cargo','tabla1',5,'tbl1');" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> RUTA: </font></font><font id="i_xvenc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $dta2['asignados']?></font></font></font></a>

        <a class="label label-warning" onclick="vAjax('cargo','tabla1',6,'tbl1');" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> MOTIVADOS: </font></font><font id="i_xvenc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $dta2['motivados']?></font></font></font></a>

        <a class="label label-success"  onclick="vAjax('cargo','tabla1',7,'tbl1');" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ENTREGADOS: </font></font><font id="i_tot"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $dta2['entregados']?></font></font></font></a>
    </div>
        <?php endforeach; }else{ ?> <div class="col-md-12"><center><i>(No hay información)</i></center></div> <?php } ?>
</font>
</div>


<table class="table table-striped table-bordered table-hover" id="dtable2" width="100%">
        <thead>
            <tr>
                <th data-class="expand" style="width:100px">Cod.Orden </th>
                <th data-hide="esconder" style="width:150px"><center>Fecha Inicio - Fecha Fin</center></th>          
                <th data-hide="esconder" style="width:100px"><center>Cod.Apoyo</center></th>
                 <th data-hide="esconder" style="width:150px"><center>Servicio</center></th>          
                <th data-class="expand" style="width:250px"><center>Cliente</center></th>       
                <th data-hide="esconder" style="width:120px"><center>Contacto</center></th>
                <th data-hide="esconder" style="width:30px"><center>Cargo</center></th>          
                <th data-hide="esconder" style="width:5px"><center>Estado</center></th>              
            </tr>
        </thead>
        <tbody><?php 
            if($dt1){ foreach ($dt1 as $dta1):  ?>
            <tr>
                    <td><a class="label label-primary" onclick="filt('<?php echo $dta1['cod_orden']; ?>')"><?php echo $dta1['cod_orden']; ?></a></td>   
                    <td><?php echo $dta1['fecha_inicio'],' - ',$dta1['fecha_vencimiento']; ?></td>
                    <td><span class="label label-success "> <?php echo $dta1['cod_apoyo']; ?></span></td>
                    <td><?php echo $dta1['servicio']; ?></td>
                    <td><?php echo $dta1['cliente']; ?></td>
                    <td><?php echo $dta1['contacto']; ?></td>
                    <td><?php echo $dta1['cargo']; ?></td>                            
                    <td>
                        <?php if ($dta1['estado']=='0') { ?>
                            <span class="label label-default"  onclick="AT('Nuevos')">N<font>uevos</font></span>
                       <?php } elseif ($dta1['estado']>='1' && $dta1['estado']<='4'){ ?>
                        <span class="label label-danger" onclick="">A<font>poyo Postal</font></span>
                       <?php } elseif ($dta1['estado']=='5'){ ?>
                        <a class="label label-primary" onclick="vAjax('cargo','mRuta',<?php echo $dta1['idapoyo']; ?>,'modal2');">En Ruta <font></font></a>
                        <?php } elseif ($dta1['estado']=='6'){ ?>
                        <a class="label label-warning" onclick="vAjax('cargo','mRuta',<?php echo $dta1['idapoyo']; ?>,'modal2');">Motivado<font></font></a>
                        <?php } elseif ($dta1['estado']=='7' ){ ?>
                        <a class="label label-success" onclick="vAjax('cargo','mRuta',<?php echo $dta1['idapoyo']; ?>,'modal2');">Entregado</a>
                        <?php }else { ?>
                        <a class="label label-default" onclick="">Error</a>
                        <?php } ?>        

                    </td>                    
                                            
                </tr>
            <?php 
                endforeach; 
                }
            ?>
        </tbody>
    </table>
    <script type="text/javascript"> table(2,10,3); </script> 


<script type="text/javascript">
    function filt(st){ 
        var table = $('#dtable2').DataTable();
        table.search(st).draw();
        //$( "input[type=search]" ).val('aaaa');
    }
</script>
